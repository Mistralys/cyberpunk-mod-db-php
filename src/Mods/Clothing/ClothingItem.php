<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use CPMDB\Mods\Items\BaseItem;

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
     * @param array<string,mixed> $itemDef
     */
    public function __construct(ClothingModInfo $mod, array $itemDef)
    {
        parent::__construct($mod, $itemDef);
    }
}
