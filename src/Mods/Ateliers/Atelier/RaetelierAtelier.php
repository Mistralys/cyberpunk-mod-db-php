<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Raetelier - Raenef's Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class RaetelierAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'raetelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/16681';
    public const ATELIER_NAME = 'Raetelier - Raenef\'s Atelier';
    
    public const MOD_IDS = array(
        'clothing.street-set',
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
        return array('Raenef', 'Raenef1');
    }
}
