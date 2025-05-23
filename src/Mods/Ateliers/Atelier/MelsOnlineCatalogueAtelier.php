<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Mel's Online Catalogue
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class MelsOnlineCatalogueAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'mels-online-catalogue';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/14248';
    public const ATELIER_NAME = 'Mel\'s Online Catalogue';
    
    public const MOD_IDS = array(
        'clothing.karyna-heart-choker',
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
        return array('meluminary');
    }
}
