<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Complectedd Necklace Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class ComplecteddNecklaceAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'complectedd-necklace-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/7016';
    public const ATELIER_NAME = 'Complectedd Necklace Atelier';
    
    public const MOD_IDS = array(
        'clothing.alts-necklaces',
        'clothing.alts-choker',
        'clothing.beaded-choker',
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
        return array('complectedd', 'mistshield');
    }
}
