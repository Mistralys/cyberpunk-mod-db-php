<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\ArrayDataCollection;
use AppUtils\FileHelper\JSONFile;
use AppUtils\Interfaces\StringPrimaryRecordInterface;
use CPMDB\Mods\Collection\BaseCategory;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Items\ItemCategory;
use CPMDB\Mods\Items\ItemInfoInterface;
use CPMDB\Mods\Mod\Screenshots\ModScreenshotCollection;
use CPMDB\Mods\Mod\SeeAlso\SeeAlsoReferenceInterface;

/**
 * Interface for mod information records.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
interface ModInfoInterface extends StringPrimaryRecordInterface
{
    /**
     * Unique ID of the mod with category, e.g. `clothing.catsuit`.
     * @return string
     */
    public function getUUID() : string;

    /**
     * ID of the mod without the category, e.g. `catsuit`.
     * @return string
     */
    public function getModID() : string;

    public function getName() : string;
    public function getCategory() : BaseCategory;
    public function getModCollection() : ModCollection;
    public function getDataFile() : JSONFile;
    public function getRawData() : ArrayDataCollection;
    public function getScreenshotCollection() : ModScreenshotCollection;
    public function getSlug() : string;
    public function getURL() : string;
    /**
     * List of author names.
     * @return string[]
     */
    public function getAuthors() : array;

    /**
     * List of tags, including those inherited from
     * the item categories and items. These are all
     * the tags that are used in the mod.
     *
     * NOTE: The tags are sorted alphabetically.
     *
     * @return string[]
     */
    public function getTags() : array;

    /**
     * List of tags assigned to the mod itself.
     *
     * NOTE: The tags are sorted alphabetically.
     *
     * @return string[]
     */
    public function getOwnTags() : array;

    public function hasTag(string $tag) : bool;
    public function getItemCollection() : ModItemCollectionInterface;

    /**
     * @param ItemCategory $category
     * @param array<mixed> $itemData
     * @return ItemInfoInterface
     */
    public function createItem(ItemCategory $category, array $itemData) : ItemInfoInterface;

    /**
     * @return class-string
     */
    public function getItemClass() : string;

    /**
     * Whether the mod has a "See Also" section.
     * Use {@see self::getSeeAlso()} to get the references.
     *
     * @return bool
     */
    public function hasSeeAlso() : bool;

    /**
     * If the mod has any "see also" references, this will
     * return them as an array of {@see SeeAlsoReferenceInterface}.
     *
     * Use `instanceof` to check the type of each reference.
     *
     * Possible types are:
     *
     * - {@see LinkReference}
     * - {@see ModReference}
     *
     * @return SeeAlsoReferenceInterface[]
     */
    public function getSeeAlso() : array;

    /**
     * List of mod IDs that are linked with this mod.
     * @return string[]
     */
    public function getLinkedModIDs() : array;

    /**
     * Gets all mods that are related to this mod.
     * @return ModInfoInterface[]
     */
    public function getLinkedMods() : array;
}
