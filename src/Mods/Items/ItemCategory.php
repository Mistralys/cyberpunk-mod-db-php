<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\Interfaces\StringableInterface;
use CPMDB\Mods\Mod\ModInfoInterface;
use CPMDB\Mods\Mod\ModItemCollectionInterface;
use CPMDB\Mods\Tags\TagCollection;

/**
 * Categories are used to group items together thematically
 * in the database. Every item belongs to a category.
 *
 * This is returned by {@see ModItemCollectionInterface::getCategories()}.
 *
 * NOTE: The item class that is used is defined by the mod,
 * see {@see ModInfoInterface::getItemClass()}.
 *
 * @package CPMDB
 * @subpackage Items
 *
 * @method ItemInfoInterface[] getAll()
 * @method ItemInfoInterface getDefault()
 * @method ItemInfoInterface getByID(string $id)
 */
class ItemCategory extends BaseItemCollection implements StringableInterface
{
    private string $category;
    private ModInfoInterface $mod;

    /**
     * @var string[]
     */
    private array $ownTags;

    /**
     * @var array<int,array<string,mixed>>
     */
    private array $itemData;

    /**
     * @param ModInfoInterface $mod
     * @param string $category
     * @param string[] $tags
     * @param array<int,array<string,mixed>> $itemData
     */
    public function __construct(ModInfoInterface $mod, string $category, array $tags, array $itemData)
    {
        $this->mod = $mod;
        $this->category = $category;
        $this->ownTags = $tags;
        $this->itemData = $itemData;

        sort($this->ownTags);
    }

    public function getLabel() : string
    {
        return $this->category;
    }

    public function getMod(): ModInfoInterface
    {
        return $this->mod;
    }

    /**
     * @var string[]|null
     */
    private ?array $inheritedTags = null;

    /**
     * Gets all tags assigned to the category.
     * This includes the tags inherited from the mod,
     * as well as those inherited from its items.
     *
     * In essence, these tags are: Mod + Category + Items.
     *
     * This list of tags excludes tags from any other
     * categories within the mod, as compared to
     * calling {@see ModInfoInterface::getTags()}, which
     * includes all tags from all categories and items.
     *
     * NOTE: The tags are sorted alphabetically.
     *
     * @return string[]
     */
    public function getTags(): array
    {
        if(isset($this->inheritedTags)) {
            return $this->inheritedTags;
        }

        $itemTags = array();
        foreach($this->getAll() as $item) {
            $itemTags = array_merge($itemTags, $item->getOwnTags());
        }

        $this->inheritedTags = TagCollection::mergeTags(
            $this->mod->getOwnTags(),
            $this->getOwnTags(),
            $itemTags
        );

        return $this->inheritedTags;
    }

    /**
     * Gets all tags assigned to the category itself,
     * excluding any inherited ones.
     *
     * NOTE: The tags are sorted alphabetically.
     *
     * @return string[]
     */
    public function getOwnTags() : array
    {
        return $this->ownTags;
    }

    protected function registerItems(): void
    {
        foreach($this->itemData as $itemDef) {
            $this->registerItem($this->mod->createItem($this, $itemDef));
        }
    }

    public function __toString(): string
    {
        return $this->getLabel();
    }

    public function getCategories(): array
    {
        return array($this);
    }
}
