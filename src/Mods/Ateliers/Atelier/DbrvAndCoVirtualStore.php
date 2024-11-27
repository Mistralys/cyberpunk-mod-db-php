<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: DBRV n CO Virtual Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class DbrvAndCoVirtualStore extends BaseAtelier
{
    public const ATELIER_ID = 'dbrv-and-co-virtual-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/7848';
    public const ATELIER_NAME = 'DBRV n CO Virtual Store';
    
    public const MOD_IDS = array(
        'clothing.rockergirl-pants-laces',
        'clothing.techtopia-gloves',
        'clothing.yaahl-tech-tank-top',
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
        return array('DBRV');
    }
}
