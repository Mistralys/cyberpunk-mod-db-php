<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use AppUtils\Collections\BaseStringPrimaryCollection;

/**
 * Collection class that holds all clothing items for a mod.
 *
 * @package CPMDB
 * @subpackage Clothing Mods
 *
 * @method ClothingItem[] getAll()
 * @method ClothingItem getDefault()
 * @method ClothingItem getByID(string $id)
 */
class ClothingItems extends BaseStringPrimaryCollection
{
    private ClothingModInfo $modInfo;

    /**
     * @var array<mixed>
     */
    private array $itemData;

    public function __construct(ClothingModInfo $modInfo, array $items)
    {
        $this->modInfo = $modInfo;
        $this->itemData = $items;
    }

    public function getDefaultID(): string
    {
        if(!empty($this->items)) {
            return $this->items[array_key_first($this->items)]->getID();
        }

        return '';
    }

    protected function registerItems(): void
    {
        foreach($this->itemData as $itemDef) {
            $this->registerItem(new ClothingItem($this->modInfo, $itemDef));
        }
    }
}
