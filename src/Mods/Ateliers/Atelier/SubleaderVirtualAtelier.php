<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Subleader Virtual Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class SubleaderVirtualAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'subleader-virtual-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/14747';
    public const ATELIER_NAME = 'Subleader Virtual Atelier';
    
    public const MOD_IDS = array(
        'clothing.hailey-outfit',
        'clothing.nanosuit',
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
        return array('Subleader', 'Subleader100');
    }
}
