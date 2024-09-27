<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\Collections\BaseStringPrimaryCollection;


/**
 * @method ItemInfoInterface[] getAll()
 * @method ItemInfoInterface getDefault()
 * @method ItemInfoInterface getByID(string $id)
 */
abstract class BaseItemCollection extends BaseStringPrimaryCollection implements ItemCollectionInterface
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
            $this->registerItem($this->createItem($itemDef));
        }

        // Clear the item data array to free up memory
        $this->itemData = array();
    }

    abstract protected function createItem(array $itemDef) : ItemInfoInterface;

    /**
     * @var string[]|null
     */
    private ?array $itemCodes = null;

    public function getItemCodes() : array
    {
        if(isset($this->itemCodes)) {
            return $this->itemCodes;
        }

        $this->itemCodes = array();

        foreach($this->getAll() as $item) {
            $this->itemCodes[] = $item->getItemCode();
        }

        return $this->itemCodes;
    }

    public function itemCodeExists(string $itemCode) : bool
    {
        return in_array($itemCode, $this->getItemCodes());
    }
}
