<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: The Rvcoon Dumpster
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class TheRaccoonDumpsterAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'the-raccoon-dumpster';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/5802';
    public const ATELIER_NAME = 'The Rvcoon Dumpster';
    
    public const MOD_IDS = array(
        'clothing.chromed-long-blouse',
        'clothing.fancy-striped-dress',
        'clothing.tight-shiny-pants',
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
        return array('PinkyDude');
    }
}
