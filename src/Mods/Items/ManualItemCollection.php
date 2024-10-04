<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

/**
 * Manual item collection: Offers all collection functionality,
 * but items are added manually. This is useful for working with
 * lists of items.
 *
 * @package CPMDB
 * @subpackage Items
 */
class ManualItemCollection extends BaseItemCollection
{
    /**
     * @param ItemInfoInterface[] $items
     * @return ManualItemCollection
     */
    public static function create(array $items=array()) : ManualItemCollection
    {
        return (new ManualItemCollection())->addItems($items);
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

    protected function registerItems(): void
    {

    }

    private function resetCache() : void
    {
        $this->categories = null;
    }

    public function addItem(ItemInfoInterface $item) : self
    {
        $this->registerItem($item);
        $this->resetCache();
        return $this;
    }

    /**
     * @param ItemInfoInterface[] $items
     * @return $this
     */
    public function addItems(array $items) : self
    {
        foreach($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }
}
