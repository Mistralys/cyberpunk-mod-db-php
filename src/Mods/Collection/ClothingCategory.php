<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use CPMDB\Mods\Clothing\ClothingModInfo;

/**
 * Mod collection category for clothing mods.
 *
 * @package CPMDB
 * @subpackage Clothing Mods
 *
 * @method ClothingModInfo[] getAll()
 * @method ClothingModInfo getByID(string $id)
 * @method ClothingModInfo getDefault()
 */
class ClothingCategory extends BaseCategory
{
    public const CATEGORY_ID = 'clothing';

    public function getLabel(): string
    {
        return 'Clothing';
    }

    public function getFolderName(): string
    {
        return self::CATEGORY_ID;
    }

    public function getModClass(): string
    {
        return ClothingModInfo::class;
    }
}
