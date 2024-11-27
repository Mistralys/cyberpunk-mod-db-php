<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Kwek's Sartorial Omnibus Shop
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class KweksSartorialOmnibusShopAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'kweks-sartorial-omnibus-shop';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/6779';
    public const ATELIER_NAME = 'Kwek\'s Sartorial Omnibus Shop';
    
    public const MOD_IDS = array(
        'clothing.alts-gloves',
        'clothing.simple-elbow-pads',
    );
    
    public function getID(): string
    {
        return self::ATELIER_ID;
    }
    
    public function getName() : string
    {
        return self::ATELIER_NAME; 
    }
    
    public function getURL() : string
    {
        return self::ATELIER_URL; 
    }
    
    public function getAuthors() : array
    {
        return array('Kwek');
    }
}
