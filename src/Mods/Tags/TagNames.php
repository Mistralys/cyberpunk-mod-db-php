<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use CPMDB\Mods\Tags\Types\Accessories;
use CPMDB\Mods\Tags\Types\ArchiveXL;
use CPMDB\Mods\Tags\Types\Arms;
use CPMDB\Mods\Tags\Types\Body;
use CPMDB\Mods\Tags\Types\BodyHyst;
use CPMDB\Mods\Tags\Types\BodyLush;
use CPMDB\Mods\Tags\Types\BodySolo;
use CPMDB\Mods\Tags\Types\BodySpawn0;
use CPMDB\Mods\Tags\Types\BodyVTK;
use CPMDB\Mods\Tags\Types\BodyVanilla;
use CPMDB\Mods\Tags\Types\Clothing;
use CPMDB\Mods\Tags\Types\Codeware;
use CPMDB\Mods\Tags\Types\CyberEngineTweaks;
use CPMDB\Mods\Tags\Types\Earrings;
use CPMDB\Mods\Tags\Types\Emissive;
use CPMDB\Mods\Tags\Types\EquipmentEX;
use CPMDB\Mods\Tags\Types\Feet;
use CPMDB\Mods\Tags\Types\FemaleV;
use CPMDB\Mods\Tags\Types\Gloves;
use CPMDB\Mods\Tags\Types\Hair;
use CPMDB\Mods\Tags\Types\Hands;
use CPMDB\Mods\Tags\Types\Head;
use CPMDB\Mods\Tags\Types\Holo;
use CPMDB\Mods\Tags\Types\Jewelry;
use CPMDB\Mods\Tags\Types\Legs;
use CPMDB\Mods\Tags\Types\MaleV;
use CPMDB\Mods\Tags\Types\Neck;
use CPMDB\Mods\Tags\Types\Outfit;
use CPMDB\Mods\Tags\Types\Physics;
use CPMDB\Mods\Tags\Types\RED4EXT;
use CPMDB\Mods\Tags\Types\Torso;
use CPMDB\Mods\Tags\Types\TweakXL;
use CPMDB\Mods\Tags\Types\VirtualAtelier;

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
    public const ARCHIVE_XL = ArchiveXL::TAG_NAME;
    public const ARMS = Arms::TAG_NAME;
    public const BODY = Body::TAG_NAME;
    public const BODY_HYST = BodyHyst::TAG_NAME;
    public const BODY_LUSH = BodyLush::TAG_NAME;
    public const BODY_SOLO = BodySolo::TAG_NAME;
    public const BODY_SPAWN0 = BodySpawn0::TAG_NAME;
    public const BODY_VANILLA = BodyVanilla::TAG_NAME;
    public const BODY_VTK = BodyVTK::TAG_NAME;
    public const CLOTHING = Clothing::TAG_NAME;
    public const CODEWARE = Codeware::TAG_NAME;
    public const CYBER_ENGINE_TWEAKS = CyberEngineTweaks::TAG_NAME;
    public const EARRINGS = Earrings::TAG_NAME;
    public const EMISSIVE = Emissive::TAG_NAME;
    public const EQUIPMENT_EX = EquipmentEX::TAG_NAME;
    public const FEET = Feet::TAG_NAME;
    public const FEMALE_V = FemaleV::TAG_NAME;
    public const GLOVES = Gloves::TAG_NAME;
    public const HAIR = Hair::TAG_NAME;
    public const HANDS = Hands::TAG_NAME;
    public const HEAD = Head::TAG_NAME;
    public const HOLO = Holo::TAG_NAME;
    public const JEWELRY = Jewelry::TAG_NAME;
    public const LEGS = Legs::TAG_NAME;
    public const MALE_V = MaleV::TAG_NAME;
    public const NECK = Neck::TAG_NAME;
    public const OUTFIT = Outfit::TAG_NAME;
    public const PHYSICS = Physics::TAG_NAME;
    public const RED4EXT = RED4EXT::TAG_NAME;
    public const TORSO = Torso::TAG_NAME;
    public const TWEAK_XL = TweakXL::TAG_NAME;
    public const VIRTUAL_ATELIER = VirtualAtelier::TAG_NAME;
}
