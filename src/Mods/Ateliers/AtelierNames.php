<?php

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers;

use function CPMDB\Mods\Tools\generateAteliersEnumClass;

/**
 * Atelier enum class: List of all available atelier mod IDs 
 * as constants for easy access. 
 * 
 * ## Usage
 * 
 * Use the constant values to fetch the according atelier mod
 * using the atelier collection. Example:
 * 
 * ```php
 * use CPMDB\Mods\Ateliers\AtelierCollection;
 * 
 * $collection = AtelierCollection::getInstance();
 * 
 * $atelier = $collection->getByID(AtelierNames::CUBS_CLOSET);
 * ```
 * 
 * @package CPMDB
 * @subpackage Ateliers
 * @auto-generated See {@see generateAteliersEnumClass()}
 */
class AtelierNames
{
    public const ADSHIELD_ATELIER_STORE = 'adshield-atelier-store';
    public const ALVARIX_CUSTOM_STORE = 'alvarix-custom-store';
    public const ATELIER_FOR_FLASH_POSERS = 'atelier-for-flash-posers';
    public const BREEZYS_ACCESSORY_ALCOVE = 'breezys-accessory-alcove';
    public const BREEZYS_CLOTHING_EMPORIUM = 'breezys-clothing-emporium';
    public const BREEZYS_THRIFT_SHOP = 'breezys-thrift-shop';
    public const COMPLECTEDD_NECKLACE_ATELIER = 'complectedd-necklace-atelier';
    public const CORPO_CLOTHING = 'corpo-clothing';
    public const CUBS_CLOSET = 'cubs-closet';
    public const CUB_ATELIER_STORE = 'cub-atelier-store';
    public const CYBERBLING_JEWELLERS = 'cyberbling-jewellers';
    public const DBRV_AND_CO_VIRTUAL_STORE = 'dbrv-and-co-virtual-store';
    public const DISCOS_STORE = 'discos-store';
    public const DUSTY_VIRTUAL_ATELIER = 'dusty-virtual-atelier';
    public const FLOWER_SHOP = 'flower-shop';
    public const FRAIL_INC = 'frail-inc';
    public const HYST_ATELIER_STORE = 'hyst-atelier-store';
    public const KMKCS_VIRTUAL_ATELIER = 'kmkcs-virtual-atelier';
    public const KWEKS_FAMILY_JEWELS = 'kweks-family-jewels';
    public const KWEKS_SARTORIAL_OMNIBUS_SHOP = 'kweks-sartorial-omnibus-shop';
    public const LILYDELTA_BOUTIQUES = 'lilydelta-boutiques';
    public const MAYO_VIRTUAL_ATELIER = 'mayo-virtual-atelier';
    public const MELS_ONLINE_CATALOGUE = 'mels-online-catalogue';
    public const MONSTER_RAIDER_ATELIER_STORE = 'monster-raider-atelier-store';
    public const NC_FASHION = 'nc-fashion';
    public const NEMIES_CLOSET = 'nemies-closet';
    public const NEUROMANCE = 'neuromance';
    public const NOLA_AND_VEEGEE_FEMININE_STORE = 'nola-and-veegee-feminine-store';
    public const NOLA_DREAMER_AND_AQUELYRAS_ATELIER = 'nola-dreamer-and-aquelyras-atelier';
    public const NOLA_DREAMER_BOUTIQUE = 'nola-dreamer-boutique';
    public const PEACHU_AND_HYST_ATELIER_STORE = 'peachu-and-hyst-atelier-store';
    public const PEACHU_ATELIER_STORE = 'peachu-atelier-store';
    public const RAEMS_ATELIER_STORE = 'raems-atelier-store';
    public const RAETELIER = 'raetelier';
    public const ROSAS_SHOP = 'rosas-shop';
    public const SCOFIL_VIRTUAL_ATELIER = 'scofil-virtual-atelier';
    public const SEAWRIGHT_OPTOMETRY_SHOP = 'seawright-optometry-shop';
    public const SEVEN_VIRTUAL_ATELIER_STORE = 'seven-virtual-atelier-store';
    public const SUBLEADER_VIRTUAL_ATELIER = 'subleader-virtual-atelier';
    public const SUMISTYLE_CORPORATE_ATELIER = 'sumistyle-corporate-atelier';
    public const THE_BEAN_CUP_ATELIER = 'the-bean-cup-atelier';
    public const THE_RACCOON_DUMPSTER = 'the-raccoon-dumpster';
    public const THE_RACCOON_DUMPSTER_2 = 'the-raccoon-dumpster-2';
    public const TLS_AND_MAYO_VIRTUAL_ATELIER = 'tls-and-mayo-virtual-atelier';
    public const TONYS_CASUAL_STORE = 'tonys-casual-store';
    public const TOTTES_ATELIER = 'tottes-atelier';
    public const TQM_ATELIER = 'tqm-atelier';
    public const VEEGEE_JEWELRY_SHOP = 'veegee-jewelry-shop';
    public const VEEGEE_SHOP = 'veegee-shop';
    public const VEEGEE_SHOP_2 = 'veegee-shop-2';
    public const VEEGEE_SHOP_3 = 'veegee-shop-3';
    public const VIKTOR_VEKTOR_STORE = 'viktor-vektor-store';
    public const VOIDWEAR_VIRTUAL_ATELIER = 'voidwear-virtual-atelier';
    public const WOLFDEN_VIRTUAL_ATELIER_STORE = 'wolfden-virtual-atelier-store';
    public const YEVGENIYS_SECOND_HAND = 'yevgeniys-second-hand';
    public const ZENITEX_ATELIER = 'zenitex-atelier';
}