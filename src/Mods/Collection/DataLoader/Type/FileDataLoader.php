<?php
/**
 * @package CPMDB
 * @subackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\DataLoader\Type;

use AppUtils\FileHelper\JSONFile;
use AppUtils\FileHelper_Exception;
use CPMDB\Mods\Collection\BaseCategory;
use CPMDB\Mods\Collection\DataLoader\BaseDataLoader;
use CPMDB\Mods\Collection\ModCollectionException;

/**
 * File-based data loader for mod data: Loads the mod information
 * from JSON files in the `data` folder provided by the main mod
 * database package.
 *
 * @package CPMDB
 * @subackage Mod Collection
 */
class FileDataLoader extends BaseDataLoader
{
    public const ERROR_LOADING_MOD_DATA = 164801;

    public function loadModData(BaseCategory $category, string $modID) : array
    {
        $path = sprintf(
            '%s/%s.json',
            $category->getDataFolder(),
            $modID
        );

        try
        {
            $result = array();

            foreach(JSONFile::factory($path)->parse() as $key => $value) {
                $result[(string)$key] = $value;
            }

            return $result;
        }
        catch (FileHelper_Exception $e)
        {
            throw new ModCollectionException(
                sprintf(
                    'File exception while trying to to load mod data for mod [%s] in category [%s].',
                    $modID,
                    $category->getID()
                ),
                sprintf(
                    'Attempted to load file [%s].',
                    $path
                ),
                self::ERROR_LOADING_MOD_DATA,
                $e
            );
        }
    }

    public function getIDsByCategory(BaseCategory $category) : array
    {
        $ids = array();

        foreach($category->getDataFiles() as $jsonFile) {
            $ids[] = $jsonFile->getBaseName();
        }

        return $ids;
    }

    protected function handleModsLoaded(): void
    {
        $this->collection->writeCache();
    }
}
