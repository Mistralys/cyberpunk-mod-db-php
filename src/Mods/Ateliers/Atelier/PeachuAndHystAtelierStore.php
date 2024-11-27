<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Peachu and Hyst Atelier Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class PeachuAndHystAtelierStore extends BaseAtelier
{
    public const ATELIER_ID = 'peachu-and-hyst-atelier-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/6943';
    public const ATELIER_NAME = 'Peachu and Hyst Atelier Store';
    
    public const MOD_IDS = array(
        'clothing.peachu-top',
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
        return array('Hyst', 'LxRHyst', 'Peachu', 'PeachuHime');
    }
}
