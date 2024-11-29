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
 * Information about the Body-Hyst-Angel tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class BodyHystAngel extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Hyst-Angel';
    
    public const RELATED_TAGS = array(
        TagNames::BODY_HYST_EBB,
        TagNames::BODY_HYST_RB,
        TagNames::BODY_HYST_EBBP
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
        return 'Body-Hyst-Angel';
    }

    public function getDescription(): string
    {
        return 'New improved version of the other Hyst body mods';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
    
    protected function _getLinks() : array
    {
        return array(
            new TagLink($this, 'https://www.nexusmods.com/cyberpunk2077/mods/14896', 'Nexus')
        );
    }
}
