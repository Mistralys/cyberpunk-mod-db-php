<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Atelier for Flash Posers
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class AtelierForFlashPosers extends BaseAtelier
{
    public const ATELIER_ID = 'atelier-for-flash-posers';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/8886';
    public const ATELIER_NAME = 'Atelier for Flash Posers';
    
    public const MOD_IDS = array(
        'clothing.flash-posers-atelier',
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
        return array('jerinski');
    }
}
