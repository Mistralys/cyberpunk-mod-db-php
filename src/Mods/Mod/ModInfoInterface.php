<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\FileHelper\JSONFile;
use AppUtils\Interfaces\StringPrimaryRecordInterface;
use CPMDB\Mods\Collection\BaseCategory;

/**
 * Interface for mod information records.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
interface ModInfoInterface extends StringPrimaryRecordInterface
{
    public function getName() : string;
    public function getCategory() : BaseCategory;
    public function hasImage() : bool;
    public function getDataFile() : JSONFile;
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
}
