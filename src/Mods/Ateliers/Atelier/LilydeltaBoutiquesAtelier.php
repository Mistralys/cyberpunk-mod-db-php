<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: LilyDelta Boutiques
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class LilydeltaBoutiquesAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'lilydelta-boutiques';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/14523';
    public const ATELIER_NAME = 'LilyDelta Boutiques';
    
    public const MOD_IDS = array(
        'clothing.lizzy-wizzy-headset',
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
        return array('LilyDelta');
    }
}
