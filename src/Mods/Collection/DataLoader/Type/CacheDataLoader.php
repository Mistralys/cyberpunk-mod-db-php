<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\DataLoader\Type;

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\BaseCategory;
use CPMDB\Mods\Collection\DataLoader\BaseDataLoader;
use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;
use CPMDB\Mods\Collection\ModCollection;

/**
 * Loads mod data from a serialized cache file. This is
 * created dynamically, and is used to avoid scanning the
 * mod files and open them individually every time the app
 * is loaded.
 *
 * Instead, everything is loaded from the cache file, which
 * is in serialized format - this loads faster than parsing
 * JSON.
 *
 * @package CPMDB
 * @subackage Mod Collection
 */
class CacheDataLoader extends BaseDataLoader
{
    /**
     * @var array<string,array<string,array<string,mixed>>>
     */
    private array $data = array();

    public function __construct(ModCollection $collection, callable $registerCallback, FolderInfo $cacheFolder)
    {
        parent::__construct($collection, $registerCallback);

        $data = CacheDataWriter::resolveCacheFile($cacheFolder)->parse();

        foreach($data as $categoryID => $mods) {
            $categoryID = (string)$categoryID;
            $mods = (array)$mods;

            $this->data[$categoryID] = array();
            foreach($mods as $modID => $modData) {
                $this->data[$categoryID][(string)$modID] = (array)$modData;
            }
        }
    }

    public function getIDsByCategory(BaseCategory $category): array
    {
        if(isset($this->data[$category->getID()])) {
            return array_keys($this->data[$category->getID()]);
        }

        return array();
    }

    public function loadModData(BaseCategory $category, string $modID): array
    {
        return $this->data[$category->getID()][$modID];
    }

    protected function handleModsLoaded(): void
    {
    }
}
