<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: VV0LFDEN - Virtual Atelier Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class WolfdenVirtualAtelierStore extends BaseAtelier
{
    public const ATELIER_ID = 'wolfden-virtual-atelier-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/6572';
    public const ATELIER_NAME = 'VV0LFDEN - Virtual Atelier Store';
    
    public const MOD_IDS = array(
        'clothing.basic-tees',
        'clothing.zip-up-dress',
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
        return array('Halkuonn');
    }
}
