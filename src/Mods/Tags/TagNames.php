<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use CPMDB\Mods\Tags\Types\Accessories;
use CPMDB\Mods\Tags\Types\Animated;
use CPMDB\Mods\Tags\Types\AppearanceCreatorMod;
use CPMDB\Mods\Tags\Types\ArchiveXL;
use CPMDB\Mods\Tags\Types\Arms;
use CPMDB\Mods\Tags\Types\AutoScale;
use CPMDB\Mods\Tags\Types\Belt;
use CPMDB\Mods\Tags\Types\BodyAdonis;
use CPMDB\Mods\Tags\Types\BodyAtlas;
use CPMDB\Mods\Tags\Types\BodyEVB;
use CPMDB\Mods\Tags\Types\BodyFlat;
use CPMDB\Mods\Tags\Types\BodyGymfiend;
use CPMDB\Mods\Tags\Types\BodyHyst;
use CPMDB\Mods\Tags\Types\BodyHystAngel;
use CPMDB\Mods\Tags\Types\BodyHystEBB;
use CPMDB\Mods\Tags\Types\BodyHystEBBN;
use CPMDB\Mods\Tags\Types\BodyHystEBBNRB;
use CPMDB\Mods\Tags\Types\BodyHystEBBP;
use CPMDB\Mods\Tags\Types\BodyHystEBBPRB;
use CPMDB\Mods\Tags\Types\BodyHystEBBRB;
use CPMDB\Mods\Tags\Types\BodyHystRB;
use CPMDB\Mods\Tags\Types\BodyLush;
use CPMDB\Mods\Tags\Types\BodySoLush;
use CPMDB\Mods\Tags\Types\BodySolo;
use CPMDB\Mods\Tags\Types\BodySoloArms;
use CPMDB\Mods\Tags\Types\BodySoloSmall;
use CPMDB\Mods\Tags\Types\BodySoloUltimate;
use CPMDB\Mods\Tags\Types\BodySongbird;
use CPMDB\Mods\Tags\Types\BodySpawn0;
use CPMDB\Mods\Tags\Types\BodyTags;
use CPMDB\Mods\Tags\Types\BodyVTKBig;
use CPMDB\Mods\Tags\Types\BodyVTKSmall;
use CPMDB\Mods\Tags\Types\BodyVTKVanillaHD;
use CPMDB\Mods\Tags\Types\BodyValentine;
use CPMDB\Mods\Tags\Types\BodyVanilla;
use CPMDB\Mods\Tags\Types\Bodysuit;
use CPMDB\Mods\Tags\Types\Boots;
use CPMDB\Mods\Tags\Types\Bra;
use CPMDB\Mods\Tags\Types\Bracelet;
use CPMDB\Mods\Tags\Types\Choker;
use CPMDB\Mods\Tags\Types\Clothing;
use CPMDB\Mods\Tags\Types\Coat;
use CPMDB\Mods\Tags\Types\Codeware;
use CPMDB\Mods\Tags\Types\CommunityPaletteProject;
use CPMDB\Mods\Tags\Types\Corset;
use CPMDB\Mods\Tags\Types\Cosplay;
use CPMDB\Mods\Tags\Types\CyberEngineTweaks;
use CPMDB\Mods\Tags\Types\Decals;
use CPMDB\Mods\Tags\Types\DoItYourself;
use CPMDB\Mods\Tags\Types\Dress;
use CPMDB\Mods\Tags\Types\Earring;
use CPMDB\Mods\Tags\Types\Emissive;
use CPMDB\Mods\Tags\Types\EquipmentEX;
use CPMDB\Mods\Tags\Types\Feet;
use CPMDB\Mods\Tags\Types\FemV;
use CPMDB\Mods\Tags\Types\FullBody;
use CPMDB\Mods\Tags\Types\GarmentSupport;
use CPMDB\Mods\Tags\Types\Glasses;
use CPMDB\Mods\Tags\Types\Gloves;
use CPMDB\Mods\Tags\Types\Hair;
use CPMDB\Mods\Tags\Types\Hands;
use CPMDB\Mods\Tags\Types\Hat;
use CPMDB\Mods\Tags\Types\Head;
use CPMDB\Mods\Tags\Types\Holo;
use CPMDB\Mods\Tags\Types\Jacket;
use CPMDB\Mods\Tags\Types\Jewelry;
use CPMDB\Mods\Tags\Types\Leggings;
use CPMDB\Mods\Tags\Types\Legs;
use CPMDB\Mods\Tags\Types\Lingerie;
use CPMDB\Mods\Tags\Types\MaleV;
use CPMDB\Mods\Tags\Types\Mask;
use CPMDB\Mods\Tags\Types\MicroblendResource;
use CPMDB\Mods\Tags\Types\Modular;
use CPMDB\Mods\Tags\Types\MultilayerMaterialExtender;
use CPMDB\Mods\Tags\Types\Navel;
use CPMDB\Mods\Tags\Types\Neck;
use CPMDB\Mods\Tags\Types\Necklace;
use CPMDB\Mods\Tags\Types\Outfit;
use CPMDB\Mods\Tags\Types\Panties;
use CPMDB\Mods\Tags\Types\Pants;
use CPMDB\Mods\Tags\Types\Physics;
use CPMDB\Mods\Tags\Types\Piercing;
use CPMDB\Mods\Tags\Types\Red4Ext;
use CPMDB\Mods\Tags\Types\Reflective;
use CPMDB\Mods\Tags\Types\Ring;
use CPMDB\Mods\Tags\Types\Shirt;
use CPMDB\Mods\Tags\Types\Shoes;
use CPMDB\Mods\Tags\Types\Shorts;
use CPMDB\Mods\Tags\Types\Skimpy;
use CPMDB\Mods\Tags\Types\Skirt;
use CPMDB\Mods\Tags\Types\Sleeves;
use CPMDB\Mods\Tags\Types\Stockings;
use CPMDB\Mods\Tags\Types\Suit;
use CPMDB\Mods\Tags\Types\Top;
use CPMDB\Mods\Tags\Types\Torso;
use CPMDB\Mods\Tags\Types\Transparent;
use CPMDB\Mods\Tags\Types\TweakXL;
use CPMDB\Mods\Tags\Types\Underwear;
use CPMDB\Mods\Tags\Types\VirtualAtelier;
use CPMDB\Mods\Tags\Types\Waist;

/**
 * Helper class with all tag names for easy lookup,
 * instead of using the class names directly.
 * 
 * NOTE: This imports all tag classes, so if you just
 * need a few, it's better to import them separately.
 * 
 * **Auto-generated file, do not edit!**
 * 
 * See `/tools/generate-tag-names.php` for more info.
 * 
 * @package CPMDB
 * @subpackage Tags 
 */
class TagNames
{
    public const ACCESSORIES = Accessories::TAG_NAME;
    public const ANIMATED = Animated::TAG_NAME;
    public const APPEARANCE_CREATOR_MOD = AppearanceCreatorMod::TAG_NAME;
    public const ARCHIVE_XL = ArchiveXL::TAG_NAME;
    public const ARMS = Arms::TAG_NAME;
    public const AUTO_SCALE = AutoScale::TAG_NAME;
    public const BELT = Belt::TAG_NAME;
    public const BODYSUIT = Bodysuit::TAG_NAME;
    public const BODY_ADONIS = BodyAdonis::TAG_NAME;
    public const BODY_ATLAS = BodyAtlas::TAG_NAME;
    public const BODY_EVB = BodyEVB::TAG_NAME;
    public const BODY_FLAT = BodyFlat::TAG_NAME;
    public const BODY_GYMFIEND = BodyGymfiend::TAG_NAME;
    public const BODY_HYST = BodyHyst::TAG_NAME;
    public const BODY_HYST_ANGEL = BodyHystAngel::TAG_NAME;
    public const BODY_HYST_EBB = BodyHystEBB::TAG_NAME;
    public const BODY_HYST_EBBN = BodyHystEBBN::TAG_NAME;
    public const BODY_HYST_EBBNRB = BodyHystEBBNRB::TAG_NAME;
    public const BODY_HYST_EBBP = BodyHystEBBP::TAG_NAME;
    public const BODY_HYST_EBBPRB = BodyHystEBBPRB::TAG_NAME;
    public const BODY_HYST_EBBRB = BodyHystEBBRB::TAG_NAME;
    public const BODY_HYST_RB = BodyHystRB::TAG_NAME;
    public const BODY_LUSH = BodyLush::TAG_NAME;
    public const BODY_SOLO = BodySolo::TAG_NAME;
    public const BODY_SOLO_ARMS = BodySoloArms::TAG_NAME;
    public const BODY_SOLO_SMALL = BodySoloSmall::TAG_NAME;
    public const BODY_SOLO_ULTIMATE = BodySoloUltimate::TAG_NAME;
    public const BODY_SONGBIRD = BodySongbird::TAG_NAME;
    public const BODY_SO_LUSH = BodySoLush::TAG_NAME;
    public const BODY_SPAWN0 = BodySpawn0::TAG_NAME;
    public const BODY_TAGS = BodyTags::TAG_NAME;
    public const BODY_VALENTINE = BodyValentine::TAG_NAME;
    public const BODY_VANILLA = BodyVanilla::TAG_NAME;
    public const BODY_VTK_BIG = BodyVTKBig::TAG_NAME;
    public const BODY_VTK_SMALL = BodyVTKSmall::TAG_NAME;
    public const BODY_VTK_VANILLA_HD = BodyVTKVanillaHD::TAG_NAME;
    public const BOOTS = Boots::TAG_NAME;
    public const BRA = Bra::TAG_NAME;
    public const BRACELET = Bracelet::TAG_NAME;
    public const CHOKER = Choker::TAG_NAME;
    public const CLOTHING = Clothing::TAG_NAME;
    public const COAT = Coat::TAG_NAME;
    public const CODEWARE = Codeware::TAG_NAME;
    public const COMMUNITY_PALETTE_PROJECT = CommunityPaletteProject::TAG_NAME;
    public const CORSET = Corset::TAG_NAME;
    public const COSPLAY = Cosplay::TAG_NAME;
    public const CYBER_ENGINE_TWEAKS = CyberEngineTweaks::TAG_NAME;
    public const DECALS = Decals::TAG_NAME;
    public const DO_IT_YOURSELF = DoItYourself::TAG_NAME;
    public const DRESS = Dress::TAG_NAME;
    public const EARRING = Earring::TAG_NAME;
    public const EMISSIVE = Emissive::TAG_NAME;
    public const EQUIPMENT_EX = EquipmentEX::TAG_NAME;
    public const FEET = Feet::TAG_NAME;
    public const FEM_V = FemV::TAG_NAME;
    public const FULL_BODY = FullBody::TAG_NAME;
    public const GARMENT_SUPPORT = GarmentSupport::TAG_NAME;
    public const GLASSES = Glasses::TAG_NAME;
    public const GLOVES = Gloves::TAG_NAME;
    public const HAIR = Hair::TAG_NAME;
    public const HANDS = Hands::TAG_NAME;
    public const HAT = Hat::TAG_NAME;
    public const HEAD = Head::TAG_NAME;
    public const HOLO = Holo::TAG_NAME;
    public const JACKET = Jacket::TAG_NAME;
    public const JEWELRY = Jewelry::TAG_NAME;
    public const LEGGINGS = Leggings::TAG_NAME;
    public const LEGS = Legs::TAG_NAME;
    public const LINGERIE = Lingerie::TAG_NAME;
    public const MALE_V = MaleV::TAG_NAME;
    public const MASK = Mask::TAG_NAME;
    public const MICROBLEND_RESOURCE = MicroblendResource::TAG_NAME;
    public const MODULAR = Modular::TAG_NAME;
    public const MULTILAYER_MATERIAL_EXTENDER = MultilayerMaterialExtender::TAG_NAME;
    public const NAVEL = Navel::TAG_NAME;
    public const NECK = Neck::TAG_NAME;
    public const NECKLACE = Necklace::TAG_NAME;
    public const OUTFIT = Outfit::TAG_NAME;
    public const PANTIES = Panties::TAG_NAME;
    public const PANTS = Pants::TAG_NAME;
    public const PHYSICS = Physics::TAG_NAME;
    public const PIERCING = Piercing::TAG_NAME;
    public const RED4EXT = Red4Ext::TAG_NAME;
    public const REFLECTIVE = Reflective::TAG_NAME;
    public const RING = Ring::TAG_NAME;
    public const SHIRT = Shirt::TAG_NAME;
    public const SHOES = Shoes::TAG_NAME;
    public const SHORTS = Shorts::TAG_NAME;
    public const SKIMPY = Skimpy::TAG_NAME;
    public const SKIRT = Skirt::TAG_NAME;
    public const SLEEVES = Sleeves::TAG_NAME;
    public const STOCKINGS = Stockings::TAG_NAME;
    public const SUIT = Suit::TAG_NAME;
    public const TOP = Top::TAG_NAME;
    public const TORSO = Torso::TAG_NAME;
    public const TRANSPARENT = Transparent::TAG_NAME;
    public const TWEAK_XL = TweakXL::TAG_NAME;
    public const UNDERWEAR = Underwear::TAG_NAME;
    public const VIRTUAL_ATELIER = VirtualAtelier::TAG_NAME;
    public const WAIST = Waist::TAG_NAME;
}
