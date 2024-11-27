<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Se7en Virtual Atelier Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class SevenVirtualAtelierStore extends BaseAtelier
{
    public const ATELIER_ID = 'seven-virtual-atelier-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/6360/';
    public const ATELIER_NAME = 'Se7en Virtual Atelier Store';
    
    public const MOD_IDS = array(
        'clothing.lace-lingerie',
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
        return array('xBaebsae');
    }
}
