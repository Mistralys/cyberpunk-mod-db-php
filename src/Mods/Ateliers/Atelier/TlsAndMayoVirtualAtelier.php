<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: TLS and Mayo Virtual Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class TlsAndMayoVirtualAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'tls-and-mayo-virtual-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/15184';
    public const ATELIER_NAME = 'TLS and Mayo Virtual Atelier';
    
    public const MOD_IDS = array(
        'clothing.comfy-dress',
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
        return array('Mayo', 'NotMayoSan', 'TheLoneStrider', 'TheLoneStrider13');
    }
}
