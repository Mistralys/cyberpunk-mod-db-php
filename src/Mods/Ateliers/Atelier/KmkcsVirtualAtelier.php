<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: KMKC's Virtual Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class KmkcsVirtualAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'kmkcs-virtual-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/16065/';
    public const ATELIER_NAME = 'KMKC\'s Virtual Atelier';
    
    public const MOD_IDS = array(
        'clothing.negan-jacket',
        'clothing.neon-razor-outfit',
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
        return array('Rosslin', 'Rosslinn');
    }
}
