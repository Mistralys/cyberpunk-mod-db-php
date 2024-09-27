<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use CPMDB\Mods\Items\BaseItemCollection;
use CPMDB\Mods\Items\ItemCategory;
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

    public function getCETCommands(): string
    {
        $items = array();
        foreach($this->getAll() as $item) {
            $items[] = $item->getCETCommand();
        }

        return implode("\n", $items);
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

    private ?bool $categorized = null;

    public function hasCategories(): bool
    {
        if(isset($this->categorized)) {
            return $this->categorized;
        }

        $this->categorized = false;

        foreach($this->getAll() as $item) {
            if($item->getCategory() !== '') {
                $this->categorized = true;
                break;
            }
        }

        return $this->categorized;
    }

    /**
     * @var ItemCategory[]|null
     */
    private ?array $categories = null;

    /**
     * @return ItemCategory[]
     */
    public function getCategorized() : array
    {
        if(isset($this->categories)) {
            return array_values($this->categories);
        }

        $this->categories = array();

        foreach($this->getAll() as $item) {
            $category = $item->getCategory();
            if($category === '') {
                $category = 'Uncategorized';
            }

            if(!isset($this->categories[$category])) {
                $this->categories[$category] = new ItemCategory($this->modInfo, $category);
            }

            $this->categories[$category]->add($item);
        }

        ksort($this->categories);

        return array_values($this->categories);
    }
}
