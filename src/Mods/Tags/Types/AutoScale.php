<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

/**
 * Information about the AutoScale tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class AutoScale extends BaseTagInfo
{
    public const TAG_NAME = 'AutoScale';
    
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
        return 'AutoScale';
    }

    public function getDescription(): string
    {
        return 'Clothing that automatically scales to the player\'s level';
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
