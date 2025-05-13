<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Corpo Clothing
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class CorpoClothingAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'corpo-clothing';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/18044';
    public const ATELIER_NAME = 'Corpo Clothing';
    
    public const MOD_IDS = array(
        'clothing.pozer-jacket-and-cyberdeck',
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
        return array('Sumi', 'SumiTerra');
    }
}
