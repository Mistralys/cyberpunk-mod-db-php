<?php
/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */

declare(strict_types=1);

namespace CPMDB\Mods\Clothing;

use AppUtils\ArrayDataCollection;
use AppUtils\Interfaces\StringPrimaryRecordInterface;
use CPMDB\Mods\Mod\ItemInfoInterface;

/**
 * @package CPMDB
 * @subpackage Clothing Mods
 */
class ClothingItem implements ItemInfoInterface
{
    private ArrayDataCollection $data;
    private ClothingModInfo $mod;
    private string $uuid;

    /**
     * @param ClothingModInfo $mod
     * @param array<string,mixed> $itemDef
     */
    public function __construct(ClothingModInfo $mod, array $itemDef)
    {
        $this->mod = $mod;
        $this->data = ArrayDataCollection::create($itemDef);
        $this->uuid = $this->mod->getUUID().'.'.$this->getItemCode();
    }

    public function getID() : string
    {
        return $this->uuid;
    }

    public function getUUID(): string
    {
        return $this->uuid;
    }

    public function getMod(): ClothingModInfo
    {
        return $this->mod;
    }

    public function getModID() : string
    {
        return $this->mod->getUUID();
    }

    public function getName() : string
    {
        return $this->data->getString('name');
    }

    public function getNameWithCategory() : string
    {
        $category = $this->getCategory();

        if(empty($category)) {
            return $this->getName();
        }

        return $category.' - '.$this->getName();
    }

    public function getCategory() : string
    {
        return $this->data->getString('category');
    }

    public function getItemCode() : string
    {
        return $this->data->getString('code');
    }
}
