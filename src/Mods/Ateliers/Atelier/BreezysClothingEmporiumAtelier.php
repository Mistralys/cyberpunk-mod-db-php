<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Breezy's Clothing Emporium
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class BreezysClothingEmporiumAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'breezys-clothing-emporium';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/14744';
    public const ATELIER_NAME = 'Breezy\'s Clothing Emporium';
    
    public const MOD_IDS = array(
        'clothing.chic-skirt',
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
        return array('Breezypunk');
    }
}
