<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use CPMDB\Mods\Items\BaseItem;
use CPMDB\Mods\Items\ItemCategory;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * @package CPMDB
 * @subpackage Clothing Mods
 *
 * @method ClothingModInfo getMod()
 */
class ClothingItem extends BaseItem
{
    /**
     * @param ClothingModInfo $mod
     * @param ItemCategory $category
     * @param array<string,mixed> $itemDef
     */
    public function __construct(ClothingModInfo $mod, ItemCategory $category, array $itemDef)
    {
        parent::__construct($mod, $category, $itemDef);
    }
}
