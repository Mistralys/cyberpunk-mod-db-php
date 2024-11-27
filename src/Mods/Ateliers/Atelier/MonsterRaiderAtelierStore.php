<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: MONSTERaider Atelier Store
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class MonsterRaiderAtelierStore extends BaseAtelier
{
    public const ATELIER_ID = 'monster-raider-atelier-store';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/7269';
    public const ATELIER_NAME = 'MONSTERaider Atelier Store';
    
    public const MOD_IDS = array(
        'clothing.aurore-modular-set',
        'clothing.biker-boots',
        'clothing.celebrity-dress-modular',
        'clothing.formal-corpo-dress',
        'clothing.skirts-expansion-part1',
        'clothing.skirts-expansion-part2',
        'clothing.slim-bolero-jacket',
        'clothing.strap-dress',
        'clothing.thigh-gun-holster',
        'clothing.zipped-suit',
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
        return array('MONSTERaider');
    }
}
