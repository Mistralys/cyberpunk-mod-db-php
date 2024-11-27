<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Disco's Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class DiscosStore extends BaseAtelier
{
    public const ATELIER_ID = 'discos-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/8853';
    public const ATELIER_NAME = 'Disco\'s Store';
    
    public const MOD_IDS = array(
        'clothing.npc-accessories',
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
        return array('Disco', 'deadengine959');
    }
}
