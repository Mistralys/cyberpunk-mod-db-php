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
use CPMDB\Mods\Items\ItemCollectionInterface;

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
    public function hasImage() : bool;
    public function getDataFile() : JSONFile;
    public function getRawData() : ArrayDataCollection;
    public function getImageURL() : string;
    public function getSlug() : string;
    public function getURL() : string;
    /**
     * List of author names.
     * @return string[]
     */
    public function getAuthors() : array;

    /**
     * List of tags.
     * @return string[]
     */
    public function getTags() : array;

    public function hasTag(string $tag) : bool;
    public function getItemCollection() : ItemCollectionInterface;
}
