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
            $this->itemCollection = new ClothingItems($this, $this->getItemData());
        }

        return $this->itemCollection;
    }

    /**
     * @return array<string,array<string,mixed>>
     */
    private function getItemData() : array
    {
        $result = array();
        foreach($this->data->getArray('items') as $key => $itemDef) {
            $result[(string)$key] = (array)$itemDef;
        }

        return $result;
    }
}
