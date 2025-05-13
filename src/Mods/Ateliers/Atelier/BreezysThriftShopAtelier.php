<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: Breezy's Thrift Shop
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class BreezysThriftShopAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'breezys-thrift-shop';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/18465';
    public const ATELIER_NAME = 'Breezy\'s Thrift Shop';
    
    public const MOD_IDS = array(
        'clothing.hoodie-vest',
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
        return array('Breezypunk');
    }
}
