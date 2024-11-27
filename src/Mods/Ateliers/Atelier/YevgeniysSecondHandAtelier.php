<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Yevgeniy's 2nd Hand
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class YevgeniysSecondHandAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'yevgeniys-second-hand';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/15765';
    public const ATELIER_NAME = 'Yevgeniy\'s 2nd Hand';
    
    public const MOD_IDS = array(
        'clothing.bicep-biomonitor',
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
        return array('707 Tactical');
    }
}
