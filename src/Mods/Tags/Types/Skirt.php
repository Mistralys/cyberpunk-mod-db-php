<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;
use CPMDB\Mods\Tags\TagNames;


/**
 * Information about the Skirt tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class Skirt extends BaseTagInfo
{
    public const TAG_NAME = 'Skirt';
    
    public const RELATED_TAGS = array(
        TagNames::LEGS
    );
   
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
        return 'Skirt';
    }

    public function getDescription(): string
    {
        return '';
    }
    
    public function getCategory(): string
    {
        return 'Clothing items';
    }
    
    protected function _getLinks() : array
    {
        return array();
    }
}
