<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;
use CPMDB\Mods\Tags\TagLink;


/**
 * Information about the GarmentSupport tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class GarmentSupport extends BaseTagInfo
{
    public const TAG_NAME = 'GarmentSupport';
    
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
        return 'GarmentSupport';
    }

    public function getDescription(): string
    {
        return 'Clothing system that handles tucking pants into boots and shirts under jackets.';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
    
    protected function _getLinks() : array
    {
        return array(
            new TagLink($this, 'https://wiki.redmodding.org/cyberpunk-2077-modding/for-mod-creators-theory/3d-modelling/garment-support-how-does-it-work', 'Modding Wiki article')
        );
    }
}
