<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use CPMDB\Mods\Ateliers\AtelierInterface;
use CPMDB\Mods\Mod\BaseModInfo;

/**
 * Mod information for clothing mods.
 *
 * @package CPMDB
 * @subpackage Clothing Mods
 */
class ClothingModInfo extends BaseModInfo
{
    private ?bool $hasAtelier = null;

    public function hasAtelier() : bool
    {
        if(!isset($this->hasAtelier)) {
            $this->hasAtelier = !empty($this->getAtelierURL());
        }

        return $this->hasAtelier;
    }

    public function getAtelierURL() : string
    {
        return $this->data->getString('atelier');
    }

    private bool $atelierLoaded = false;
    private ?AtelierInterface $atelier = null;

    public function getAtelier() : ?AtelierInterface
    {
        if($this->atelierLoaded) {
            return $this->atelier;
        }

        if($this->hasAtelier()) {
            $this->atelier = $this
                ->getModCollection()
                ->createAteliers()
                ->getByURL($this->getAtelierURL());
        }

        return $this->atelier;
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
