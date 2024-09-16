<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use AppUtils\FileHelper\FolderInfo;
use AppUtils\FileHelper\JSONFile;
use AppUtils\Interfaces\StringPrimaryCollectionInterface;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Interface for mod categories, like clothing mods.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
interface ModCategoryInterface extends StringPrimaryCollectionInterface
{
    public function getFolderName() : string;

    /**
     * @return class-string
     */
    public function getModClass() : string;

    public function getDataFolder() : FolderInfo;
    public function getDataURL() : string;

    /**
     * @return JSONFile[]
     */
    public function getDataFiles() : array;

    /**
     * @return ModInfoInterface[]
     */
    public function getAll() : array;

    public function getByID(string $id): ModInfoInterface;
    public function getDefault(): ModInfoInterface;
}
