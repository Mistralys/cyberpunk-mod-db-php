<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Cyb3rbling Jeweller's
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class CyberblingJewellersAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'cyberbling-jewellers';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/14191';
    public const ATELIER_NAME = 'Cyb3rbling Jeweller\'s';
    
    public const MOD_IDS = array(
        'clothing.angel-heart-navel-piercing',
        'clothing.liquid-heart-earrings',
        'clothing.star-hairclips',
        'clothing.stellar-navel-piercing',
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
        return array('cyb3rsn4k3', 'cyb3rsn4k34li3n');
    }
}
