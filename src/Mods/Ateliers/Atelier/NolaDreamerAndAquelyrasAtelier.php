<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Nola Dreamer and Aquelyras Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class NolaDreamerAndAquelyrasAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'nola-dreamer-and-aquelyras-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/8704';
    public const ATELIER_NAME = 'Nola Dreamer and Aquelyras Atelier';
    
    public const MOD_IDS = array(
        'clothing.street-outfit',
        'clothing.summer-outfit',
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
        return array('Aquelyras', 'NolaDreamer');
    }
}
