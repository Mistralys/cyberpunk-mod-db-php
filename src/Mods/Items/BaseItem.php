<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\ArrayDataCollection;
use CPMDB\Mods\Mod\ModInfoInterface;
use CPMDB\Mods\Tags\TagCollection;

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
    private ItemCategory $category;

    /**
     * @param ModInfoInterface $mod
     * @param array<string,mixed> $itemDef
     */
    public function __construct(ModInfoInterface $mod, ItemCategory $category, array $itemDef)
    {
        $this->mod = $mod;
        $this->data = ArrayDataCollection::create($itemDef);
        $this->uuid = $this->mod->getUUID().'.'.$this->getItemCode();
        $this->category = $category;
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

    /**
     * @var string[]|null
     */
    private ?array $inheritedTags = null;

    public function getTags(): array
    {
        if($this->inheritedTags !== null) {
            return $this->inheritedTags;
        }

        $this->inheritedTags = TagCollection::mergeTags(
            $this->mod->getOwnTags(),
            $this->category->getOwnTags(),
            $this->getOwnTags()
        );

        return $this->inheritedTags;
    }

    /**
     * @var string[]|null
     */
    private ?array $ownTags = null;

    public function getOwnTags() : array
    {
        if(!isset($this->ownTags)) {
            $this->ownTags = TagCollection::filterTags($this->data->getArray(ItemInfoInterface::KEY_TAGS));
        }

        return $this->ownTags;
    }

    public function getNameWithCategory() : string
    {
        $category = $this->getCategory()->getLabel();

        if(empty($category)) {
            return $this->getName();
        }

        return $category.' - '.$this->getName();
    }

    public function getCategory() : ItemCategory
    {
        return $this->category;
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
