<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\ArrayDataCollection;
use AppUtils\ClassHelper;
use AppUtils\ClassHelper\BaseClassHelperException;
use AppUtils\Collections\CollectionException;
use AppUtils\ConvertHelper;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\JSONFile;
use CPMDB\Mods\Collection\BaseCategory;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Items\ItemCategory;
use CPMDB\Mods\Items\ItemInfoInterface;
use CPMDB\Mods\Mod\Screenshots\ModScreenshotCollection;
use CPMDB\Mods\Mod\SeeAlso\LinkReference;
use CPMDB\Mods\Tags\TagCollection;

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
    public const KEY_MOD_NAME = 'mod';
    public const KEY_SEE_ALSO = 'seeAlso';
    public const KEY_SEE_ALSO_URL = 'url';
    public const KEY_SEE_ALSO_LABEL = 'label';
    public const KEY_LINKED_MODS = 'linkedMods';

    protected JSONFile $dataFile;
    protected string $uuid;
    protected ArrayDataCollection $data;
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
    }

    public function getCategory() : BaseCategory
    {
        return $this->category;
    }

    public function getModCollection() : ModCollection
    {
        return $this->category->getModCollection();
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

    private ?ModScreenshotCollection $screenCollection = null;

    public function getScreenshotCollection() : ModScreenshotCollection
    {
        if(!isset($this->screenCollection)) {
            $this->screenCollection = new ModScreenshotCollection($this);
        }

        return $this->screenCollection;
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

    /**
     * @param ItemCategory $category
     * @param array<mixed> $itemData
     * @return ItemInfoInterface
     *
     * @throws BaseClassHelperException
     */
    public function createItem(ItemCategory $category, array $itemData) : ItemInfoInterface
    {
        $class = $this->getItemClass();

        return ClassHelper::requireObjectInstanceOf(
            ItemInfoInterface::class,
            new $class($this, $category, $itemData)
        );
    }

    abstract public function getItemClass() : string;

    /**
     * @var ModInfoInterface[]|null
     */
    private ?array $linkedMods = null;

    /**
     * @return ModInfoInterface[]
     * @throws CollectionException
     */
    public function getLinkedMods() : array
    {
        if(isset($this->linkedMods)) {
            return $this->linkedMods;
        }

        $this->linkedMods = array();

        $collection = $this->getModCollection();

        foreach($this->getLinkedModIDs() as $modID) {
            $this->linkedMods[] = $collection->getByID($modID);
        }

        return $this->linkedMods;
    }

    public function getLinkedModIDs() : array
    {
        $result = array();
        $collection = $this->getModCollection();

        foreach($this->data->getArray(self::KEY_LINKED_MODS) as $modID) {
            if(!is_scalar($modID)) {
                continue;
            }

            $modID = (string)$modID;

            // If no path is specified, assume the mod is in the same category.
            if(!strpos($modID, '.')) {
                $modID = $this->category->getID().'.'.$modID;
            }

            if($collection->idExists($modID)) {
                $result[] = $modID;
            }
        }

        return $result;
    }

    public function hasSeeAlso() : bool
    {
        return $this->data->keyHasValue(self::KEY_SEE_ALSO);
    }

    /**
     * @var LinkReference[]|null
     */
    private ?array $seeAlso = null;

    /**
     * @return LinkReference[]
     */
    public function getSeeAlso() : array
    {
        if(isset($this->seeAlso)) {
            return $this->seeAlso;
        }

        $list = $this->data->getArray(self::KEY_SEE_ALSO);

        $this->seeAlso = array();

        foreach($list as $def)
        {
            if(!is_array($def)) {
                continue;
            }

            $entry = $this->createSeeAlsoEntry($def);

            if($entry !== null) {
                $this->seeAlso[] = $entry;
            }
        }

        return $this->seeAlso;
    }

    /**
     * @param array<mixed> $def
     * @return LinkReference|null
     */
    private function createSeeAlsoEntry(array $def) : ?LinkReference
    {
        if(isset($def[self::KEY_SEE_ALSO_URL]) && is_scalar($def[self::KEY_SEE_ALSO_URL])) {
            return $this->createLinkReference((string)$def[self::KEY_SEE_ALSO_URL], $def);
        }

        return null;
    }

    /**
     * @param string $url
     * @param array<mixed> $def
     * @return LinkReference
     */
    private function createLinkReference(string $url, array $def) : LinkReference
    {
        $label = null;
        if(isset($def[self::KEY_SEE_ALSO_LABEL]) && is_scalar($def[self::KEY_SEE_ALSO_LABEL])) {
            $label = (string)$def[self::KEY_SEE_ALSO_LABEL];
        }

        return new LinkReference($this, $url, $label);
    }
}
