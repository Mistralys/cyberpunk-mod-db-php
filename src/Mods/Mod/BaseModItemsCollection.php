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
     * @var array<int,array<string,mixed>>
     */
    private array $itemCategoriesData;

    /**
     * @var ItemCategory[]
     */
    private array $categories = array();

    /**
     * @param ModInfoInterface $modInfo
     * @param array<string,array<string,mixed>> $itemCategories
     */
    public function __construct(ModInfoInterface $modInfo, array $itemCategories)
    {
        $this->modInfo = $modInfo;
        $this->itemCategoriesData = $itemCategories;
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
        foreach ($this->itemCategoriesData as $categoryDef) {
            $this->registerItemCategory($categoryDef);
        }

        // Clear the data array to free up memory
        $this->itemCategoriesData = array();
    }

    /**
     * @param array<string,mixed> $categoryData
     * @return void
     */
    protected function registerItemCategory(array $categoryData) : void
    {
        $category = new ItemCategory(
            $this->modInfo,
            $categoryData['label'] ?? '',
            $this->filterTags($categoryData['tags'] ?? null),
            $this->filterItems($categoryData['items'] ?? null)
        );

        $this->categories[] = $category;

        foreach($category->getAll() as $item) {
            $this->registerItem($item);
        }
    }

    /**
     * @param mixed $tags
     * @return string[]
     */
    private function filterTags(mixed $tags) : array
    {
        if(!is_array($tags)) {
            return array();
        }

        $result = array();
        foreach($tags as $tag) {
            if(is_string($tag) || is_int($tag)) {
                $result[] = (string)$tag;
            }
        }

        return $result;
    }

    /**
     * @param mixed $items
     * @return array<int,array<string,mixed>>
     */
    private function filterItems(mixed $items) : array
    {
        if(!is_array($items)) {
            return array();
        }

        $result = array();
        foreach($items as $item) {
            if(is_array($item)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * @return ItemCategory[]
     */
    public function getCategories() : array
    {
        $this->initItems();

        return $this->categories;
    }
}
