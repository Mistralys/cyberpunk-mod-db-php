<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Veegee Shop 3
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class VeegeeShop3Atelier extends BaseAtelier
{
    public const ATELIER_ID = 'veegee-shop-3';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/18890';
    public const ATELIER_NAME = 'Veegee Shop 3';
    
    public const MOD_IDS = array(
        'clothing.casual-style-outfit-part-21',
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
