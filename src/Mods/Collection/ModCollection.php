<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use AppUtils\BaseException;
use AppUtils\ClassHelper;
use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\FolderInfo;
use AppUtils\FileHelper\JSONFile;
use AppUtils\FileHelper\PathInfoInterface;
use AppUtils\FileHelper_Exception;
use AppUtils\Interfaces\StringPrimaryRecordInterface;
use Brick\Event\EventDispatcher;
use CPMDB\Mods\Clothing\ClothingModInfo;
use CPMDB\Mods\Collection\DataLoader\DataLoaderInterface;
use CPMDB\Mods\Collection\DataLoader\Type\CacheDataLoader;
use CPMDB\Mods\Collection\DataLoader\Type\FileDataLoader;
use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;
use CPMDB\Mods\Collection\Filter\ItemFilter;
use CPMDB\Mods\Collection\Filter\ModFilter;
use CPMDB\Mods\Collection\Indexer\IndexManager;
use CPMDB\Mods\Items\ItemCollection;
use CPMDB\Mods\Mod\ModInfoInterface;
use Mistralys\ChangelogParser\ChangelogParser;
use Throwable;

/**
 * Collection of all known mods.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 *
 * @method ModInfoInterface[] getAll()
 * @method ModInfoInterface getDefault()
 * @method ModInfoInterface getByID(string $id)
 */
class ModCollection extends BaseStringPrimaryCollection
{
    public const DB_GIT_NAME = 'mistralys/cyberpunk-mod-db';

    public const EVENT_MODS_LOADED = 'ModsLoaded';
    public const ERROR_VERSION_NOT_FOUND = 165301;

    private ?FolderInfo $dataFolder = null;
    private string $dataURL;
    private FolderInfo $cacheFolder;
    private DataLoaderInterface $dataLoader;
    private EventDispatcher $events;
    private FolderInfo $vendorFolder;

    public function __construct(FolderInfo $vendorFolder, FolderInfo $cacheFolder, string $dataURL)
    {
        $this->vendorFolder =  FolderInfo::factory(sprintf(
            '%s/%s',
            $vendorFolder,
            self::DB_GIT_NAME
        ));;

        $this->cacheFolder = $cacheFolder;
        $this->dataURL = $dataURL;
        $this->events = new EventDispatcher();
        $this->dataLoader = $this->createDataLoader();
    }

    private function createDataLoader() : DataLoaderInterface
    {
        $registerCallback = $this->registerItem(...);

        if(CacheDataWriter::isCacheEnabled() && CacheDataWriter::cacheIsValid($this)) {
            return new CacheDataLoader($this, $registerCallback, $this->cacheFolder);
        }

        return new FileDataLoader($this, $registerCallback);
    }

    public static function create(FolderInfo $vendorFolder, FolderInfo $cacheFolder, string $vendorURL) : ModCollection
    {
        return new ModCollection(
            $vendorFolder,
            $cacheFolder,
            sprintf(
                '%s/%s/data',
                $vendorURL,
                self::DB_GIT_NAME
            )
        );
    }

    public function isLoadedFromCache() : bool
    {
        return $this->dataLoader instanceof CacheDataLoader;
    }

    public function getDataFolder() : FolderInfo
    {
        if(isset($this->dataFolder)) {
            return $this->dataFolder;
        }

        $this->dataFolder = FolderInfo::factory(sprintf(
            '%s/data',
            $this->vendorFolder
        ));

        return $this->dataFolder;
    }

    public function getCacheFolder() : FolderInfo
    {
        return $this->cacheFolder;
    }

    public function getDataURL() : string
    {
        return $this->dataURL;
    }

    private ?ClothingCategory $categoryClothing = null;

    public function categoryClothing() : ClothingCategory
    {
        if(!isset($this->categoryClothing)) {
            $this->categoryClothing = new ClothingCategory($this);
        }

        return $this->categoryClothing;
    }

    /**
     * @param FolderInfo $dataFolder
     * @return JSONFile[]
     */
    public function getDataFiles(FolderInfo $dataFolder) : array
    {
        return $this->filterJSONFiles(
            $dataFolder
                ->createFileFinder()
                ->includeExtension('json')
                ->getFileInfos()
        );
    }

    /**
     * @param PathInfoInterface[] $files
     * @return JSONFile[]
     */
    private function filterJSONFiles(array $files) : array
    {
        $result = array();

        foreach($files as $file) {
            if($file instanceof JSONFile) {
                $result[] = $file;
            }
        }

        return $result;
    }

    public function getDefaultID(): string
    {
        if(!empty($this->items)) {
            return $this->items[array_key_first($this->items)]->getID();
        }

        return '';
    }

    protected function sortItems(StringPrimaryRecordInterface $a, StringPrimaryRecordInterface $b): int
    {
        $a = ClassHelper::requireObjectInstanceOf(ClothingModInfo::class, $a);
        $b = ClassHelper::requireObjectInstanceOf(ClothingModInfo::class, $b);

        return strnatcasecmp($a->getName(), $b->getName());
    }

    protected function registerItems(): void
    {
        $this->registerCategoryMods($this->categoryClothing());

        $this->triggerModsLoaded();
    }

    private function triggerModsLoaded() : void
    {
        $this->events->dispatch(self::EVENT_MODS_LOADED, $this);
    }

    /**
     * Adds a listener for the mods loaded event, which is called
     * once all mods have been loaded into memory.
     *
     * The callback gets a single parameter:
     *
     * - {@see ModCollection} this collection instance.
     *
     * @param callable $callback
     * @return void
     */
    public function onModsLoaded(callable $callback) : void
    {
        $this->events->addListener(self::EVENT_MODS_LOADED, $callback);
    }

    private function registerCategoryMods(BaseCategory $category) : void
    {
        $this->dataLoader->registerCategoryMods($category);
    }

    public function createFilter() : ModFilter
    {
        return new ModFilter($this);
    }

    public function createItemFilter() : ItemFilter
    {
        return new ItemFilter($this);
    }

    public function writeCache() : void
    {
        if(CacheDataWriter::cacheIsValid($this)) {
            return;
        }

        (new CacheDataWriter($this))->write();
    }

    private ?IndexManager $indexManager = null;

    public function createIndexManager() : IndexManager
    {
        if(!isset($this->indexManager)) {
            $this->indexManager = new IndexManager($this);
        }

        return $this->indexManager;
    }

    /**
     * The version of the mod database, as determined by the
     * latest version tag in the changelog of the package
     * {@see self::DB_GIT_NAME}.
     *
     * @return string
     *
     * @throws BaseException
     * @throws FileHelper_Exception
     * @throws ModCollectionException
     */
    public function getDBVersion() : string
    {
        $changelogFile = FileInfo::factory($this->vendorFolder . '/changelog.md');

        if(!$changelogFile->exists()) {
            throw new ModCollectionException(
                'Could not find the mod database changelog.',
                sprintf(
                    'Changelog file not found at: '.PHP_EOL.
                    '%s',
                    $changelogFile
                ),
                self::ERROR_VERSION_NOT_FOUND
            );
        }

        try
        {
            return ChangelogParser::parseMarkdownFile($changelogFile)
                ->requireLatestVersion()
                ->getVersionInfo()
                ->getTagVersion();
        }
        catch (Throwable $e)
        {
            throw new ModCollectionException(
                'Could not parse the mod database changelog.',
                sprintf(
                    'Tried to load changelog from file:'.PHP_EOL.
                    '%s',
                    $changelogFile
                ),
                self::ERROR_VERSION_NOT_FOUND,
                $e
            );
        }
    }

    private ?ItemCollection $itemCollection = null;

    public function getItemCollection() : ItemCollection
    {
        if(!isset($this->itemCollection)) {
            $this->itemCollection = new ItemCollection($this);
        }

        return $this->itemCollection;
    }
}
