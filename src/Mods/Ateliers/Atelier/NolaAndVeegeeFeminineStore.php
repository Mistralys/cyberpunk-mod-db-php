<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Nola x Veegee Feminine Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class NolaAndVeegeeFeminineStore extends BaseAtelier
{
    public const ATELIER_ID = 'nola-and-veegee-feminine-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/11964';
    public const ATELIER_NAME = 'Nola x Veegee Feminine Store';
    
    public const MOD_IDS = array(
        'clothing.lethal-outfit',
        'clothing.rough-outfit',
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
        return array('NolaDreamer', 'Veegee', 'VeegeeAlvarez');
    }
}
