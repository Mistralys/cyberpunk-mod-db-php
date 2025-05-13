<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Tony's Casual Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class TonysCasualStore extends BaseAtelier
{
    public const ATELIER_ID = 'tonys-casual-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/19563/';
    public const ATELIER_NAME = 'Tony\'s Casual Store';
    
    public const MOD_IDS = array(
        'clothing.trinity-outfit',
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
        return array('Tonydiz');
    }
}
