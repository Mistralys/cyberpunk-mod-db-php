<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\ModTagInfo;

class RED4EXT extends ModTagInfo
{
    public const TAG_NAME = 'R4EX';
    public const SOURCE_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/2380';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel() : string
    {
        return 'RED4EXT Script Extender';
    }

    public function getSourceURL() : string
    {
        return self::SOURCE_URL;
    }

}