<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Abstract base class for mod categories.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
abstract class BaseCategory implements ModCategoryInterface
{
    public const ERROR_MOD_ID_NOT_FOUND = 164701;
    public const ERROR_NO_MODS_IN_COLLECTION = 164702;

    public const SCREENSHOTS_FOLDER_NAME = 'screens';

    private ModCollection $collection;
    private string $id;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
        $this->id = $this->getFolderName();
    }

    abstract public function getLabel() : string;

    public function getID(): string
    {
        return $this->id;
    }

    public function getModCollection() : ModCollection
    {
        return $this->collection;
    }

    public function getDataFolder() : FolderInfo
    {
        return FolderInfo::factory($this->collection->getDataFolder().'/'.$this->getFolderName());
    }

    public function getDataURL() : string
    {
        return $this->collection->getDataURL().'/'.$this->getFolderName();
    }

    public function getScreensURL() : string
    {
        return $this->getDataURL().'/'.self::SCREENSHOTS_FOLDER_NAME;
    }

    public function getScreensFolder() : FolderInfo
    {
        return FolderInfo::factory($this->getDataFolder().'/'.self::SCREENSHOTS_FOLDER_NAME);
    }

    public function getDataFiles() : array
    {
        return $this->collection->getDataFiles($this->getDataFolder());
    }

    /**
     * @var array<string,ModInfoInterface>
     */
    private array $mods;

    /**
     * @return ModInfoInterface[]
     */
    public function getAll() : array
    {
        $this->load();

        return array_values($this->mods);
    }

    private function load() : void
    {
        if(isset($this->mods)) {
            return;
        }

        $result = array();
        $class = $this->getModClass();

        foreach($this->collection->getAll() as $modInfo) {
            if($modInfo instanceof $class) {
                $result[$modInfo->getID()] = $modInfo;
            }
        }

        $this->mods = $result;
    }

    public function countRecords(): int
    {
        $this->load();

        return count($this->mods);
    }

    public function getByID(string $id): ModInfoInterface
    {
        $this->load();

        if(isset($this->mods[$id])) {
            return $this->mods[$id];
        }

        throw new ModCollectionException(
            'Mod not found.',
            sprintf(
                'The mod with ID [%s] was not found in the collection.',
                $id
            ),
            self::ERROR_MOD_ID_NOT_FOUND
        );
    }

    public function getDefault(): ModInfoInterface
    {
        return $this->getByID($this->getDefaultID());
    }

    public function getDefaultID(): string
    {
        $this->load();

        if(!empty($this->mods)) {
            return array_key_first($this->mods);
        }

        throw new ModCollectionException(
            'No mods found.',
            sprintf(
                'No mods were found in the collection [%s].',
                $this->getFolderName()
            ),
            self::ERROR_NO_MODS_IN_COLLECTION
        );
    }

    public function idExists(string $id): bool
    {
        $this->load();

        return isset($this->mods[$id]);
    }

    public function getIDs(): array
    {
        $this->load();

        $ids = array_keys($this->mods);

        sort($ids);

        return $ids;
    }
}
