<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use AppUtils\ArrayDataCollection;
use AppUtils\Interfaces\StringPrimaryRecordInterface;

/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */
class ClothingItem implements StringPrimaryRecordInterface
{
    private ArrayDataCollection $data;
    private ClothingModInfo $mod;

    public function __construct(ClothingModInfo $mod, array $itemDef)
    {
        $this->mod = $mod;
        $this->data = ArrayDataCollection::create($itemDef);
    }

    public function getID() : string
    {
        return $this->getItemCode();
    }

    public function getMod(): ClothingModInfo
    {
        return $this->mod;
    }

    public function getName() : string
    {
        return $this->data->getString('name');
    }

    public function getNameWithCategory() : string
    {
        $category = $this->getCateogry();

        if(empty($category)) {
            return $this->getName();
        }

        return $category.' - '.$this->getName();
    }

    public function getCateogry() : string
    {
        return $this->data->getString('category');
    }

    public function getItemCode() : string
    {
        return $this->data->getString('code');
    }
}
