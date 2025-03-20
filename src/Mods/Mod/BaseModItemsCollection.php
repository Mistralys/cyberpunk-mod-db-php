<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\ArrayDataCollection;
use CPMDB\Mods\Items\BaseItemCollection;
use CPMDB\Mods\Items\ItemCategory;
use CPMDB\Mods\Items\ItemInfoInterface;
use const CPMDB\Assets\KEY_CAT_ICON;
use const CPMDB\Assets\KEY_CAT_ID;
use const CPMDB\Assets\KEY_CAT_ITEMS;
use const CPMDB\Assets\KEY_CAT_LABEL;
use const CPMDB\Assets\KEY_CAT_TAGS;

/**
 * @method ItemInfoInterface[] getAll()
 * @method ItemInfoInterface getDefault()
 * @method ItemInfoInterface getByID(string $id)
 */
abstract class BaseModItemsCollection extends BaseItemCollection implements ModItemCollectionInterface
{
    protected ModInfoInterface $modInfo;

    /**
     * @var array<int,array<mixed>>
     */
    private array $itemCategoriesData;

    /**
     * @var ItemCategory[]
     */
    private array $categories = array();

    /**
     * @param ModInfoInterface $modInfo
     * @param array<int,array<mixed>> $itemCategories
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
     * @param array<mixed> $categoryData
     * @return void
     */
    protected function registerItemCategory(array $categoryData) : void
    {
        $data = ArrayDataCollection::create($categoryData);

        $category = new ItemCategory(
            $this->modInfo,
            $data->getString(KEY_CAT_ID),
            $data->getString(KEY_CAT_LABEL),
            $data->getString(KEY_CAT_ICON),
            $this->filterTags($data->getArray(KEY_CAT_TAGS)),
            $this->filterItems($data->getArray(KEY_CAT_ITEMS))
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

    public function getCategoryIDs(): array
    {
        $ids = array();
        foreach($this->getCategories() as $category) {
            $ids[] = $category->getID();
        }

        sort($ids);

        return $ids;
    }

    public function categoryExists(string $id): bool
    {
        return in_array($id, $this->getCategoryIDs());
    }

    /**
     * @inheritDoc
     * @throws ModException {@see ModException::ERROR_CATEGORY_NOT_FOUND}
     */
    public function getCategoryByID(string $id): ItemCategory
    {
        foreach($this->getCategories() as $category) {
            if($category->getID() === $id) {
                return $category;
            }
        }

        throw new ModException(
            'Mod item category not found.',
            sprintf(
                'The category with ID [%s] was not found in the mod [%s]. '.PHP_EOL.
                'Available categories are: '.PHP_EOL.
                '- %s',
                $id,
                $this->modInfo->getID(),
                implode(PHP_EOL.'- ', $this->getCategoryIDs())
            ),
            ModException::ERROR_CATEGORY_NOT_FOUND
        );
    }
}
