<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use CPMDB\Mods\Collection\Indexer\IndexInterface;
use CPMDB\Mods\Collection\Indexer\ItemIndex;
use CPMDB\Mods\Collection\Indexer\ModIndex;

class ItemFilter extends BaseFilter
{
    public const SEARCHABLE_ATTRIBUTES = array(
        ItemIndex::KEY_ITEM_NAME,
        ItemIndex::KEY_ITEM_CATEGORY,
        ItemIndex::KEY_ITEM_CODE,
        ModIndex::KEY_MOD_NAME,
        ModIndex::KEY_MOD_AUTHORS
    );

    public const FILTERABLE_ATTRIBUTES = array(
        ModIndex::KEY_MOD_AUTHORS,
        ModIndex::KEY_MOD_TAGS
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
}
