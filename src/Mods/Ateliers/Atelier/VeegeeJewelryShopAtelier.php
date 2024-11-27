<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Veegee Jewelry Shop
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class VeegeeJewelryShopAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'veegee-jewelry-shop';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/8688';
    public const ATELIER_NAME = 'Veegee Jewelry Shop';
    
    public const MOD_IDS = array(
        'clothing.glasses-pack',
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
