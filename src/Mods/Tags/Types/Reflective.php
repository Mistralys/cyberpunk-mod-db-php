<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

/**
 * Information about the Reflective tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class Reflective extends BaseTagInfo
{
    public const TAG_NAME = 'Reflective';
    
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
        return 'Reflective';
    }

    public function getDescription(): string
    {
        return 'Items with reflective surfaces';
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
