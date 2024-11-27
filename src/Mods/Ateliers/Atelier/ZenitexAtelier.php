<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Zenitex Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class ZenitexAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'zenitex-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/10090';
    public const ATELIER_NAME = 'Zenitex Atelier';
    
    public const MOD_IDS = array(
        'clothing.armor-pads-pack',
        'clothing.military-boots',
        'clothing.military-combat-armor',
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
        return array('ScorpionTank');
    }
}
