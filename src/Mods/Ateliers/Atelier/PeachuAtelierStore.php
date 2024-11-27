<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Peachu Atelier Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class PeachuAtelierStore extends BaseAtelier
{
    public const ATELIER_ID = 'peachu-atelier-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/12233';
    public const ATELIER_NAME = 'Peachu Atelier Store';
    
    public const MOD_IDS = array(
        'clothing.comfy-set',
        'clothing.evelyn-skirt',
        'clothing.qipao-peachu',
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
        return array('Peachu', 'PeachuHime');
    }
}
