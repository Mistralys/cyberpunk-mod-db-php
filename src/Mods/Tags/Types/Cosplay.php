<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

/**
 * Information about the Cosplay tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class Cosplay extends BaseTagInfo
{
    public const TAG_NAME = 'Cosplay';
    
    public const RELATED_TAGS = array();
   
    protected function _getName(): string
    {
        return self::TAG_NAME;
    }
    
    /**
     * Full name of the tag if it's an acronym or abbreviation.
     * Example: "ArchiveXL" for the "AXL" tag.
     * 
     * @return string
     */
    public function getFullName(): string
    {
        return 'Cosplay';
    }

    public function getDescription(): string
    {
        return 'Clothing items that are inspired by characters from other media';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
    
    protected function _getLinks() : array
    {
        return array();
    }
}
