<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\ArrayDataCollection;
use AppUtils\ClassHelper;
use AppUtils\ConvertHelper;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\JSONFile;
use CPMDB\Mods\Clothing\ClothingModInfo;
use CPMDB\Mods\Collection\BaseCategory;
use CPMDB\Mods\Items\ItemCategory;
use CPMDB\Mods\Items\ItemInfoInterface;
use CPMDB\Mods\Tags\TagCollection;
use CPMDB\Mods\Tags\Types\VirtualAtelier;

/**
 * Abstract base class for mod information classes.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
abstract class BaseModInfo implements ModInfoInterface
{
    public const KEY_URL = 'url';
    public const KEY_AUTHORS = 'authors';
    public const KEY_TAGS = 'tags';
    public const KEY_MOD_NAME = 'mod';

    protected JSONFile $dataFile;
    protected string $uuid;
    protected ArrayDataCollection $data;
    protected FileInfo $screenFile;
    protected string $dataURL;
    private BaseCategory $category;
    private string $id;

    public function __construct(string $id, BaseCategory $category, ArrayDataCollection $data)
    {
        $this->category = $category;
        $this->dataURL = $category->getDataURL();
        $this->data = $data;
        $this->id = $id;
        $this->uuid = $category->getID().'.'.$id;

        $this->screenFile = FileInfo::factory(sprintf(
            '%s/screens/%s.jpg',
            $category->getDataFolder(),
            $id
        ));
    }

    public function getCategory() : BaseCategory
    {
        return $this->category;
    }

    /**
     * Unique ID of the mod (alias method of {@see self::getUUID()}).
     * @return string
     */
    public function getID(): string
    {
        return $this->uuid;
    }

    public function getUUID() : string
    {
        return $this->uuid;
    }

    /**
     * ID of the mod without the category, e.g. `catsuit`.
     * @return string
     */
    public function getModID() : string
    {
        return $this->id;
    }

    public function getDataFile() : JSONFile
    {
        return $this->dataFile;
    }

    public function getRawData() : ArrayDataCollection
    {
        return $this->data;
    }

    public function getName() : string
    {
        return $this->getRawData()->getString(self::KEY_MOD_NAME);
    }

    public function hasImage() : bool
    {
        return $this->screenFile->exists();
    }

    public function getImageURL() : string
    {
        return $this->category->getScreensURL().'/'.$this->screenFile->getName();
    }

    public function getImageFile() : FileInfo
    {
        return $this->screenFile;
    }

    private ?string $slug = null;

    public function getSlug() : string
    {
        if(!isset($this->slug)) {
            $this->slug = 'mod-'.ConvertHelper::transliterate($this->getName());
        }

        return $this->slug;
    }

    public function getURL() : string
    {
        return $this->data->getString(self::KEY_URL);
    }

    /**
     * @var string[]|null
     */
    private ?array $authors = null;

    public function getAuthors() : array
    {
        if(isset($this->authors)) {
            return $this->authors;
        }

        $this->authors = array();

        foreach($this->data->getArray(self::KEY_AUTHORS) as $author) {
            if(is_string($author)) {
                $this->authors[] = $author;
            }
        }

        return $this->authors;
    }

    /**
     * @var string[]|null
     */
    private ?array $inheritedTags = null;

    public function getTags() : array
    {
        if(isset($this->inheritedTags)) {
            return $this->inheritedTags;
        }

        // Change this to avoid an infinite loop. Use the
        // own tags instead of the inherited ones, for the
        // categories and all items.
        $tagLists = array();
        $tagLists[] = $this->getOwnTags();

        foreach($this->getItemCollection()->getCategories() as $category) {
            $tagLists[] = $category->getOwnTags();
            foreach($category->getAll() as $item) {
                $tagLists[] = $item->getOwnTags();
            }
        }

        $this->inheritedTags = TagCollection::mergeTags(...$tagLists);

        return $this->inheritedTags;
    }

    /**
     * @var string[]|null
     */
    private ?array $ownTags = null;

    public function getOwnTags() : array
    {
        if(isset($this->ownTags)) {
            return $this->ownTags;
        }

        $this->ownTags = TagCollection::filterTags($this->data->getArray(ItemInfoInterface::KEY_TAGS));

        sort($this->ownTags);

        return $this->ownTags;
    }

    public function hasTag(string $tag) : bool
    {
        $tag = strtolower($tag);

        foreach($this->getTags() as $modTag) {
            if(strtolower($modTag) === $tag) {
                return true;
            }
        }

        return false;
    }

    public function createItem(ItemCategory $category, array $itemData) : ItemInfoInterface
    {
        $class = $this->getItemClass();

        return ClassHelper::requireObjectInstanceOf(
            ItemInfoInterface::class,
            new $class($this, $category, $itemData)
        );
    }

    abstract public function getItemClass() : string;
}
