<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Tottes Atelier Shop
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class TottesAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'tottes-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/13717';
    public const ATELIER_NAME = 'Tottes Atelier Shop';
    
    public const MOD_IDS = array(
        'clothing.night-top-vol-1',
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
        return array('Tottes');
    }
}
