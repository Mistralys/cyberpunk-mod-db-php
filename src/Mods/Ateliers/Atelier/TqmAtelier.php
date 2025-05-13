<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: TQMA
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class TqmAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'tqm-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/17572';
    public const ATELIER_NAME = 'TQMA';
    
    public const MOD_IDS = array(
        'clothing.blade-outfit-and-head',
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
        return array('Tariqy');
    }
}
