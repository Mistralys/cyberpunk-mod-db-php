<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Voidwear Virtual Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class VoidwearVirtualAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'voidwear-virtual-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/12637';
    public const ATELIER_NAME = 'Voidwear Virtual Atelier';
    
    public const MOD_IDS = array(
        'clothing.casual-tshirt-pockets-and-decals',
        'clothing.knife-holster-torso',
        'clothing.round-glasses',
        'clothing.shroud',
        'clothing.turtleneck-tshirt',
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
        return array('yellingintothevoid');
    }
}
