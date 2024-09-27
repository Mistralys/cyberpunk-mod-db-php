<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use CPMDB\Mods\Items\BaseItemCollection;
use CPMDB\Mods\Items\ItemInfoInterface;

/**
 * @method ItemInfoInterface[] getAll()
 * @method ItemInfoInterface getDefault()
 * @method ItemInfoInterface getByID(string $id)
 */
abstract class BaseModItemsCollection extends BaseItemCollection implements ModItemCollectionInterface
{
    protected ModInfoInterface $modInfo;

    /**
     * @var array<string,array<string,mixed>>
     */
    private array $itemData;

    /**
     * @param ModInfoInterface $modInfo
     * @param array<string,array<string,mixed>> $items
     */
    public function __construct(ModInfoInterface $modInfo, array $items)
    {
        $this->modInfo = $modInfo;
        $this->itemData = $items;
    }

    public function getMod(): ModInfoInterface
    {
        return $this->modInfo;
    }

    protected function registerItems(): void
    {
        foreach($this->itemData as $itemDef) {
            $this->registerItem($this->createItem($itemDef));
        }

        // Clear the item data array to free up memory
        $this->itemData = array();
    }

    /**
     * @param array<string,mixed> $itemDef
     * @return ItemInfoInterface
     */
    abstract protected function createItem(array $itemDef) : ItemInfoInterface;
}
