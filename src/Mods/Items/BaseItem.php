<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\ArrayDataCollection;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Base class for all item types added by mods.
 *
 * @package CPMDB
 * @subpackage Items
 */
abstract class BaseItem implements ItemInfoInterface
{
    private ArrayDataCollection $data;
    private ModInfoInterface $mod;
    private string $uuid;

    /**
     * @param ModInfoInterface $mod
     * @param array<string,mixed> $itemDef
     */
    public function __construct(ModInfoInterface $mod, array $itemDef)
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

    public function getMod(): ModInfoInterface
    {
        return $this->mod;
    }

    public function getModID() : string
    {
        return $this->mod->getUUID();
    }

    public function getName() : string
    {
        return $this->data->getString(ItemInfoInterface::KEY_NAME);
    }

    public function getAuthors(): array
    {
        return $this->mod->getAuthors();
    }

    public function getTags(): array
    {
        return $this->mod->getTags();
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
        return $this->data->getString(ItemInfoInterface::KEY_CATEGORY);
    }

    public function getItemCode() : string
    {
        return $this->data->getString(ItemInfoInterface::KEY_CODE);
    }

    public function getCETCommand() : string
    {
        return sprintf(
            'Game.AddToInventory("Items.%s")',
            $this->getItemCode()
        );
    }
}
