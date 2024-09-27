<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Indexer;

use CPMDB\Mods\Collection\Filter\ItemFilter;
use CPMDB\Mods\Mod\ItemInfoInterface;
use Loupe\Loupe\Config\TypoTolerance;
use Loupe\Loupe\Configuration;
use Loupe\Loupe\Loupe;
use Loupe\Loupe\LoupeFactory;

class ItemIndex extends BaseIndex
{
    public const KEY_ITEM_CATEGORY = 'item_category';
    public const KEY_ITEM_CODE = 'item_code';
    public const KEY_ITEM_UUID = 'item_uuid';
    public const KEY_ITEM_NAME = 'item_name';

    public function getID(): string
    {
        return 'item';
    }

    public function getPrimaryKeyName(): string
    {
        return self::KEY_ITEM_UUID;
    }

    protected function createSearchInstance() : Loupe
    {
        return (new LoupeFactory())->create(
            (string)$this->getDataFolder()->create(),
            Configuration::create()
                ->withPrimaryKey(self::KEY_ITEM_UUID)
                ->withSearchableAttributes(ItemFilter::SEARCHABLE_ATTRIBUTES)
                ->withFilterableAttributes(ItemFilter::FILTERABLE_ATTRIBUTES)
                ->withSortableAttributes(ItemFilter::SORTABLE_ATTRIBUTES)
                ->withTypoTolerance(TypoTolerance::create()->withFirstCharTypoCountsDouble(false)) // can be further fine-tuned but is enabled by default
        );
    }

    public function collectDocumentData(): array
    {
        $data = array();

        foreach ($this->collection->getAll() as $mod) {
            foreach($mod->getItemCollection()->getAll() as $item) {
                $data[] = $this->collectItem($item);
            }
        }

        return $data;
    }

    private function collectItem(ItemInfoInterface $item) : array
    {
        $mod = $item->getMod();

        return [
            self::KEY_ITEM_UUID => $item->getID(),
            self::KEY_ITEM_NAME => $item->getName(),
            self::KEY_ITEM_CATEGORY => $item->getCategory(),
            self::KEY_ITEM_CODE => $item->getItemCode(),
            ModIndex::KEY_MOD_UUID => $item->getModID(),
            ModIndex::KEY_MOD_NAME => $mod->getName(),
            ModIndex::KEY_MOD_AUTHORS => $mod->getAuthors(),
            ModIndex::KEY_MOD_TAGS => $mod->getTags()
        ];
    }
}
