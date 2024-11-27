<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: The Rvcoon Dumpster 2
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class TheRaccoonDumpster2Atelier extends BaseAtelier
{
    public const ATELIER_ID = 'the-raccoon-dumpster-2';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/11171';
    public const ATELIER_NAME = 'The Rvcoon Dumpster 2';
    
    public const MOD_IDS = array(
        'clothing.spy-long-coat',
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
