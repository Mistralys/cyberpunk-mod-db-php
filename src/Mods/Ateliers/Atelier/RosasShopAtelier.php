<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Rosa's Shop
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class RosasShopAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'rosas-shop';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/8919';
    public const ATELIER_NAME = 'Rosa\'s Shop';
    
    public const MOD_IDS = array(
        'clothing.vs-favorite-top',
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
        return array('Rosapexa');
    }
}
