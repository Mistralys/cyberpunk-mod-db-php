<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Neuromance
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class NeuromanceAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'neuromance';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/16929';
    public const ATELIER_NAME = 'Neuromance';
    
    public const MOD_IDS = array(
        'clothing.lace-up-dress',
        'clothing.voronoi-cage-dress',
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
        return array('CaffeinatedRogue', 'CaffeineRogue');
    }
}
