<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: The Bean Cup Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class TheBeanCupAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'the-bean-cup-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/12223';
    public const ATELIER_NAME = 'The Bean Cup Atelier';
    
    public const MOD_IDS = array(
        'clothing.casino-aviators',
        'clothing.manta-ray-glasses',
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
        return array('beaniebby');
    }
}
