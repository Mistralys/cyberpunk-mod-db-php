<?php
/**
 * @package CPMDB
 * @subpackage Filtering
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use AppUtils\Collections\CollectionException;
use CPMDB\Mods\Collection\Indexer\IndexInterface;
use CPMDB\Mods\Collection\Indexer\ItemIndex;
use CPMDB\Mods\Collection\Indexer\ModIndex;
use CPMDB\Mods\Items\ItemCollectionInterface;
use CPMDB\Mods\Items\ItemInfoInterface;
use CPMDB\Mods\Items\ManualItemCollection;

/**
 * Utility class used to search for items in the collection
 * by selecting filter criteria like tags and/or search terms.
 *
 *  ## Usage
 *
 *  1. Use the collection's {@see ModCollection::createItemFilter()}
 *     method to get an instance of this class.
 *  2. Use the {@see self::selectTag()} and {@see self::selectSearchTerm()}
 *     methods to add filter criteria.
 *  3. Use the {@see self::getItems()} method to get the items
 *     that match the filter criteria.
 *
 * @package CPMDB
 * @subpackage Filtering
 */
class ItemFilter extends BaseFilter
{
    public const SEARCHABLE_ATTRIBUTES = array(
        ItemIndex::KEY_ITEM_NAME,
        ItemIndex::KEY_ITEM_CATEGORY,
        ItemIndex::KEY_ITEM_CODE,
        ItemIndex::KEY_ITEM_TAGS,
        ModIndex::KEY_MOD_NAME,
        ModIndex::KEY_MOD_AUTHORS,
        ModIndex::KEY_MOD_SEARCH_TERMS
    );

    public const FILTERABLE_ATTRIBUTES = array(
        ModIndex::KEY_MOD_AUTHORS,
        ItemIndex::KEY_ITEM_TAGS
    );

    public const SORTABLE_ATTRIBUTES = array(
        ItemIndex::KEY_ITEM_NAME,
        ItemIndex::KEY_ITEM_CATEGORY,
        ItemIndex::KEY_ITEM_CODE
    );

    public function getSearchIndex(): IndexInterface
    {
        return $this->collection
            ->createIndexManager()
            ->getItemIndex();
    }

    protected function _hasFilters(): bool
    {
        return false;
    }

    protected function appendFilters(array &$filters): void
    {

    }

    /**
     * @return ItemInfoInterface[]
     * @throws CollectionException
     */
    public function getItems() : array
    {
        $result = array();
        $collection = $this->collection->getItemCollection();

        foreach($this->getPrimaryIDs() as $itemUUID) {
            $result[] = $collection->getByID($itemUUID);
        }

        return $result;
    }

    /**
     * Like {@see self::getItems()} but returns the items as a collection
     * for easier access to additional methods.
     *
     * @return ItemCollectionInterface
     * @throws CollectionException
     */
    public function getItemsAsCollection() : ItemCollectionInterface
    {
        return ManualItemCollection::create($this->getItems());
    }

    protected function getTagsKeyName(): string
    {
        return ItemIndex::KEY_ITEM_TAGS;
    }
}
