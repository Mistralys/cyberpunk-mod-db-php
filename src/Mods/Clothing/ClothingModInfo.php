<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use CPMDB\Mods\Mod\BaseModInfo;

/**
 * Mod information for clothing mods.
 *
 * @package CPMDB
 * @subpackage Clothing Mods
 */
class ClothingModInfo extends BaseModInfo
{
    public function hasAtelier() : bool
    {
        return !empty($this->getAtelierURL());
    }

    public function getAtelierURL() : string
    {
        return $this->data->getString('atelier');
    }

    private ?ClothingItems $itemCollection = null;

    public function getItemCollection() : ClothingItems
    {
        if(!isset($this->itemCollection)) {
            $this->itemCollection = new ClothingItems($this, $this->getCategoriesData());
        }

        return $this->itemCollection;
    }

    /**
     * @return array<int,array<mixed>>
     */
    private function getCategoriesData() : array
    {
        $result = array();
        foreach($this->data->getArray('itemCategories') as $categoryDef) {
            if(is_array($categoryDef)) {
                $result[] = $categoryDef;
            }
        }

        return $result;
    }

    public function getItemClass(): string
    {
        return ClothingItem::class;
    }
}
