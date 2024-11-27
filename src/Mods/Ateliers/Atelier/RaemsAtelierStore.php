<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Raem's Atelier Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class RaemsAtelierStore extends BaseAtelier
{
    public const ATELIER_ID = 'raems-atelier-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/14210';
    public const ATELIER_NAME = 'Raem\'s Atelier Store';
    
    public const MOD_IDS = array(
        'clothing.chain-jewelry-collection',
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
        return array('raem', 'raemaze');
    }
}
