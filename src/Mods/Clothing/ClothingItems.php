<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use CPMDB\Mods\Mod\BaseModItemsCollection;

/**
 * Collection class that holds all clothing items for a mod.
 *
 * @package CPMDB
 * @subpackage Clothing Mods
 *
 * @method ClothingItem[] getAll()
 * @method ClothingItem getDefault()
 * @method ClothingItem getByID(string $id)
 * @method ClothingModInfo getMod()
 */
class ClothingItems extends BaseModItemsCollection
{
    /**
     * @param ClothingModInfo $modInfo
     * @param array<string,array<string,mixed>> $itemCategories
     */
    public function __construct(ClothingModInfo $modInfo, array $itemCategories)
    {
        parent::__construct($modInfo, $itemCategories);
    }
}
