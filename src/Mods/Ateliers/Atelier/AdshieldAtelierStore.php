<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: AdShield Atelier Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class AdshieldAtelierStore extends BaseAtelier
{
    public const ATELIER_ID = 'adshield-atelier-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/8452';
    public const ATELIER_NAME = 'AdShield Atelier Store';
    
    public const MOD_IDS = array(
        'clothing.cyberdeck-collection',
        'clothing.harness-top',
        'clothing.tactical-crop-top',
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
        return array('Adshield');
    }
}
