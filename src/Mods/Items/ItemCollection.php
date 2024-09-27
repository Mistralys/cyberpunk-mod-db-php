<?php

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use CPMDB\Mods\Collection\ModCollection;

class ItemCollection extends BaseItemCollection
{
    private ModCollection $modCollection;

    public function __construct(ModCollection $collection)
    {
        $this->modCollection = $collection;
    }

    protected function registerItems(): void
    {
        foreach($this->modCollection->getAll() as $modInfo) {
            foreach($modInfo->getItemCollection()->getAll() as $itemInfo) {
                $this->registerItem($itemInfo);
            }
        }
    }
}
