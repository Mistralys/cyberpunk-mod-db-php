<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Dusty Virtual Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class DustyVirtualAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'dusty-virtual-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/14797';
    public const ATELIER_NAME = 'Dusty Virtual Atelier';
    
    public const MOD_IDS = array(
        'clothing.aria-tloak-suit',
        'clothing.mileena-hungry-hipster-outfit',
        'clothing.starlight-dress',
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
        return array('Dusty2077');
    }
}
