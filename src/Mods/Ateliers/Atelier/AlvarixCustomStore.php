<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Alvarix Custom Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class AlvarixCustomStore extends BaseAtelier
{
    public const ATELIER_ID = 'alvarix-custom-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/4602';
    public const ATELIER_NAME = 'Alvarix Custom Store';
    
    public const MOD_IDS = array(
        'clothing.blood-rayne',
        'clothing.deus-ex-outfit',
        'clothing.evangelion-plugsuits',
        'clothing.full-body-fashionware',
        'clothing.quiet-outfit',
        'clothing.split-dress-bikini',
        'clothing.wrap-around-dress',
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
        return array('AlvarixPT');
    }
}
