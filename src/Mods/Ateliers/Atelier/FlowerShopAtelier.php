<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Flower Shop
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class FlowerShopAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'flower-shop';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/6852';
    public const ATELIER_NAME = 'Flower Shop';
    
    public const MOD_IDS = array(
        'clothing.spiky-leather-jacket',
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
        return array('FrauBlume');
    }
}
