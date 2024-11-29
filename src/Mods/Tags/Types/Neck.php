<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

/**
 * Information about the Neck tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class Neck extends BaseTagInfo
{
    public const TAG_NAME = 'Neck';
    
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
        return 'Neck';
    }

    public function getDescription(): string
    {
        return 'Neck slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
    
    protected function _getLinks() : array
    {
        return array();
    }
}
