<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use AppUtils\ClassHelper;
use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\FileHelper\FolderInfo;
use AppUtils\FileHelper\JSONFile;
use AppUtils\Interfaces\StringPrimaryRecordInterface;
use CPMDB\Mods\Clothing\ClothingModInfo;
use CPMDB\Mods\Mod\ModInfoInterface;

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

    private FolderInfo $dataFolder;
    private string $dataURL;

    public function __construct(FolderInfo $dataFolder, string $dataURL)
    {
        $this->dataFolder = $dataFolder;
        $this->dataURL = $dataURL;
    }

    public static function create(FolderInfo $vendorFolder, string $vendorURL) : ModCollection
    {
        return new ModCollection(
            FolderInfo::factory(sprintf(
            '%s/%s/data',
            $vendorFolder,
            self::DB_GIT_NAME
            )),
            sprintf(
                '%s/%s/data',
                $vendorURL,
                self::DB_GIT_NAME
            )
        );
    }

    public function getDataFolder() : FolderInfo
    {
        return $this->dataFolder;
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

    public function getDataFiles(FolderInfo $dataFolder) : array
    {
        return $this->filterJSONFiles(
            $dataFolder
                ->createFileFinder()
                ->includeExtension('json')
                ->getFileInfos()
        );
    }

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
    }

    private function registerCategoryMods(BaseCategory $category) : void
    {
        $url = $category->getDataURL();
        $folder = $category->getDataFolder();
        $modClass = $category->getModClass();

        foreach($category->getDataFiles() as $jsonFile) {
            if($jsonFile instanceof JSONFile) {
                $this->registerItem(ClassHelper::requireObjectInstanceOf(
                    $modClass,
                    new $modClass($category, $jsonFile, $folder, $url)
                ));
            }
        }
    }

    public function createFilter() : ModFilter
    {
        return new ModFilter($this);
    }
}
