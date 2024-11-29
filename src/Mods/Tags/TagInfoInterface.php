<?php
/**
 * @package CPMDB
 * @subpackage Tags
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use AppUtils\Interfaces\StringPrimaryRecordInterface;

/**
 * Interface for tag information classes. A basic implementation
 * is provided by the {@see BaseTagInfo} class.
 *
 * @package CPMDB
 * @subpackage Tags
 */
interface TagInfoInterface extends StringPrimaryRecordInterface
{
    public const RELATED_TAGS = array();

    public function getDescription() : string;

    public function getCategory() : string;

    public function hasRelatedTags() : bool;

    /**
     * @return string[]
     */
    public function getRelatedTagIDs() : array;

    /**
     * Gets all tags related to this tag, if any.
     * @return TagInfoInterface[]
     */
    public function getRelatedTags() : array;

    /**
     * Gets Web links related to this tag, if any.
     * @return TagLink[]
     */
    public function getLinks() : array;
}
