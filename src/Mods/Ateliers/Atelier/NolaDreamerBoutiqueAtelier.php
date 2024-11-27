<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Nola Dreamer Boutique
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class NolaDreamerBoutiqueAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'nola-dreamer-boutique';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/5114';
    public const ATELIER_NAME = 'Nola Dreamer Boutique';
    
    public const MOD_IDS = array(
        'clothing.alt-jacket-and-pants',
        'clothing.evelyn-coat-and-fur',
        'clothing.judy-platform-shoes',
        'clothing.michiko-dress-with-fur',
        'clothing.one-shoulder-shirt',
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
        return array('NolaDreamer');
    }
}
