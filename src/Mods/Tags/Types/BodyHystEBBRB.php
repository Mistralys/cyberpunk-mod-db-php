<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;
use CPMDB\Mods\Tags\TagNames;
use CPMDB\Mods\Tags\TagLink;


/**
 * Information about the Body-Hyst-EBBRB tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class BodyHystEBBRB extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Hyst-EBBRB';
    
    public const RELATED_TAGS = array(
        TagNames::BODY_HYST_EBB,
        TagNames::BODY_HYST_RB
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
        return 'Body-Hyst-EBBRB';
    }

    public function getDescription(): string
    {
        return 'EBBRB - Enhanced Big Breasts and Realistic Butt';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
    
    protected function _getLinks() : array
    {
        return array(
            new TagLink($this, 'https://www.nexusmods.com/cyberpunk2077/mods/4654', 'Nexus')
        );
    }
}
