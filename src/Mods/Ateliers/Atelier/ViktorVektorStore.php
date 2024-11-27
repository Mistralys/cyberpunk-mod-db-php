<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Viktor Vektor Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class ViktorVektorStore extends BaseAtelier
{
    public const ATELIER_ID = 'viktor-vektor-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/7448';
    public const ATELIER_NAME = 'Viktor Vektor Store';
    
    public const MOD_IDS = array(
        'clothing.psycho-cyber-tubes',
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
        return array('MONSTERaider');
    }
}
