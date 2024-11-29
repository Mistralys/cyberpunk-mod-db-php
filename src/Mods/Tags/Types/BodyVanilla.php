<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

/**
 * Information about the Body-Vanilla tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class BodyVanilla extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Vanilla';
    
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
        return 'Body-Vanilla';
    }

    public function getDescription(): string
    {
        return 'The vanilla body for FemV and MaleV';
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
