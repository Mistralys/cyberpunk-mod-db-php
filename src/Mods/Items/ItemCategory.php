<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\FileHelper\FileInfo;
use AppUtils\Interfaces\StringableInterface;
use CPMDB\Mods\Mod\ModInfoInterface;
use CPMDB\Mods\Mod\ModItemCollectionInterface;
use CPMDB\Mods\Tags\TagCollection;
use const CPMDB\Assets\KEY_CAT_ID;

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
    private string $iconName;
    private string $id;

    /**
     * @param ModInfoInterface $mod
     * @param string $id
     * @param string $category
     * @param string $iconName Name of the icon file (without extension), if any. Empty string otherwise.
     * @param string[] $tags
     * @param array<int,array<string,mixed>> $itemData
     */
    public function __construct(ModInfoInterface $mod, string $id, string $category, string $iconName, array $tags, array $itemData)
    {
        $this->mod = $mod;
        $this->id = $id;
        $this->iconName = $iconName;
        $this->category = $category;
        $this->ownTags = $tags;
        $this->itemData = $itemData;

        sort($this->ownTags);
    }

    public function getLabel() : string
    {
        return $this->category;
    }

    /**
     * The ID of the category, unique within the mod.
     *
     * Source: The {@see KEY_CAT_ID} key in the JSON data.
     *
     * @return string
     */
    public function getID() : string
    {
        return $this->id;
    }

    public function hasIcon() : bool
    {
        return !empty($this->iconName);
    }

    /**
     * The name of the icon file (without extension), if any.
     * @return string Icon name, or an empty string if no icon is available.
     */
    public function getIconName() : string
    {
        return $this->iconName;
    }

    public function getIconFile() : ?FileInfo
    {
        $extensions = array(
            'png',
            'jpg'
        );

        foreach($extensions as $extension) {
            $path = sprintf(
                '%s/%s-item-%s.%s',
                $this->mod->getCategory()->getScreensFolder(),
                $this->mod->getModID(),
                $this->getIconName(),
                $extension
            );

            if(file_exists($path)) {
                return FileInfo::factory($path);
            }
        }

        return null;
    }

    public function getIconURL() : string
    {
        $file = $this->getIconFile();
        if($file === null) {
            return '';
        }

        return sprintf(
            '%s/%s-item-%s.%s',
            $this->mod->getCategory()->getScreensURL(),
            $this->mod->getModID(),
            $this->getIconName(),
            $file->getExtension()
        );
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
     * > NOTE: The tags are sorted alphabetically.
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
