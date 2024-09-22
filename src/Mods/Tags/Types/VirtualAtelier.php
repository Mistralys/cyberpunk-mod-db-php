<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\ModTagInfo;

class VirtualAtelier extends ModTagInfo
{
    public const TAG_NAME = 'ATL';
    public const SOURCE_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/2987';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel() : string
    {
        return 'Virtual Atelier';
    }

    public function getSourceURL() : string
    {
        return self::SOURCE_URL;
    }
}
