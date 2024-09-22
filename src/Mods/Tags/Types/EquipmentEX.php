<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\ModTagInfo;

class EquipmentEX extends ModTagInfo
{
    public const TAG_NAME = 'EQEX';
    public const SOURCE_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/6945';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel() : string
    {
        return 'Equipment-EX Outfit Manager';
    }

    public function getSourceURL() : string
    {
        return self::SOURCE_URL;
    }
}
