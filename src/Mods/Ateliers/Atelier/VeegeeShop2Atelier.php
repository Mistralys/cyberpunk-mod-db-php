<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Veegee Shop 2
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class VeegeeShop2Atelier extends BaseAtelier
{
    public const ATELIER_ID = 'veegee-shop-2';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/13870';
    public const ATELIER_NAME = 'Veegee Shop 2';
    
    public const MOD_IDS = array(
        'clothing.assassin-outfit',
        'clothing.assassin-outfit-part-2',
        'clothing.casual-style-outfit-part-2',
        'clothing.casual-style-outfit-part-4',
        'clothing.casual-style-outfit-part-8',
        'clothing.casual-style-outfit-part-10',
        'clothing.casual-style-outfit-part-14',
        'clothing.casual-style-outfit-part-15',
        'clothing.oversized-blazer',
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
        return array('Veegee', 'VeegeeAlvarez');
    }
}
