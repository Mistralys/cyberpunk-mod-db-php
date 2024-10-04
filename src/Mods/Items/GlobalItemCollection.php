<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use CPMDB\Mods\Collection\ModCollection;

/**
 * The global, mod-independent item collection.
 * This contains all items from all mods.
 *
 * @package CPMDB
 * @subpackage Items
 */
class GlobalItemCollection extends BaseItemCollection
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

    /**
     * @var ItemCategory[]|null
     */
    private ?array $categories = null;

    public function getCategories(): array
    {
        if(isset($this->categories)) {
            return $this->categories;
        }

        $this->categories = array();

        foreach($this->getAll() as $item) {
            $this->categories[] = $item->getCategory();
        }

        return $this->categories;
    }
}
