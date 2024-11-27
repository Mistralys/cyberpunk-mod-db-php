<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: SumiStyle Corporate Atelier
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class SumistyleCorporateAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'sumistyle-corporate-atelier';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/16261?tab=files';
    public const ATELIER_NAME = 'SumiStyle Corporate Atelier';
    
    public const MOD_IDS = array(
        'clothing.corpo-clothing-hanako-top',
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
