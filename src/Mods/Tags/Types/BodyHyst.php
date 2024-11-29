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
 * Information about the Body-Hyst tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class BodyHyst extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Hyst';
    
    public const RELATED_TAGS = array(
        TagNames::BODY_HYST_EBB,
        TagNames::BODY_HYST_RB,
        TagNames::BODY_HYST_EBBP,
        TagNames::BODY_HYST_EBBPRB,
        TagNames::BODY_HYST_EBBRB,
        TagNames::BODY_HYST_ANGEL
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
        return 'Body-Hyst';
    }

    public function getDescription(): string
    {
        return 'Enhanced Big Breasts, Realistic Butt, and more';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
    
    protected function _getLinks() : array
    {
        return array(
            new TagLink($this, 'https://next.nexusmods.com/profile/LxRHyst/mods?gameId=3333', 'Nexus')
        );
    }
}
