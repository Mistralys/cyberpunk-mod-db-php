<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Cub's Closet
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class CubsClosetAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'cubs-closet';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/15621';
    public const ATELIER_NAME = 'Cub\'s Closet';
    
    public const MOD_IDS = array(
        'clothing.camisole-top',
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
        return array('cubfan82');
    }
}
