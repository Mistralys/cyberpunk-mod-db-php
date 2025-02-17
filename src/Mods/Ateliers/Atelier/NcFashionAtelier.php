<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: NC Fashion
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class NcFashionAtelier extends BaseAtelier
{
    public const ATELIER_ID = 'nc-fashion';
    public const ATELIER_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/4805';
    public const ATELIER_NAME = 'NC Fashion';
    
    public const MOD_IDS = array(
        'clothing.arasaka-corpo-shirt',
        'clothing.arasaka-jacket',
        'clothing.arasaka-sports-wear-v2',
        'clothing.bladerunner-joi-leggings-reworked',
        'clothing.bladerunner-joi-top-reworked',
        'clothing.bodysuit-spandex-and-sleeves',
        'clothing.cat-antenna',
        'clothing.catsuit',
        'clothing.cute-dress',
        'clothing.ds2-jacket-bodysuit-necklace',
        'clothing.evangelion-misato-outfit',
        'clothing.hanako-dress',
        'clothing.jacket-bolero-hex',
        'clothing.jin-kazam-outfit',
        'clothing.jinx-arcane-s2-top',
        'clothing.leather-boots',
        'clothing.spandex-leggins',
        'clothing.xrx-low-waist-leggings',
        'clothing.lucy-edgerunners-jacket',
        'clothing.lucy-edgerunners-pants',
        'clothing.lucy-edgerunners-suit',
        'clothing.motoko-kusanagi-jacket-and-bodysuit',
        'clothing.motoko-kusanagi-outfit-reworked',
        'clothing.sasha-edgerunners-suit',
        'clothing.tactical-belt',
        'clothing.turtleneck-top',
        'clothing.turtleneck-top-camo',
        'clothing.xrx-asymmetric-top',
        'clothing.xrx-dress',
        'clothing.xrx-latex-gloves',
        'clothing.xrx-leather-jacket',
        'clothing.xrx-led-leotard',
        'clothing.xrx-leggings',
        'clothing.xrx-puffer-jacket',
        'clothing.xrx-rme-jacket',
        'clothing.xrx-stockings',
        'clothing.xrx-victorian-gloves',
        'clothing.ziva-cross-cut-dress',
        'clothing.ziva-dress',
        'clothing.ziva-navel-chains',
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
        return array('Apzurv', 'EzioMaverick');
    }
}
