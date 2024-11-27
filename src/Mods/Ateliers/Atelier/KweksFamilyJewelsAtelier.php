<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Kwek's Family Jewels
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class KweksFamilyJewelsAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'kweks-family-jewels';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/6985';
    public const ATELIER_NAME = 'Kwek\'s Family Jewels';
    
    public const MOD_IDS = array(
        'clothing.elizabeth-peralez-earrings',
        'clothing.moon-and-star-earrings',
        'clothing.johnny-silverhands-string-bracelet',
        'clothing.mirrors-edge-faith-outfit',
        'clothing.netrunner-combat-top',
        'clothing.panam-jeans-spandex',
        'clothing.salander-earplugs',
        'clothing.simple-chain-bracelet',
        'clothing.sports-leggings',
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
        return array('Kwek', 'kweknexuss');
    }
}
