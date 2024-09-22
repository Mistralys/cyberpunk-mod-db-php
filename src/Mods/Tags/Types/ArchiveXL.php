<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\ModTagInfo;

class ArchiveXL extends ModTagInfo
{
    public const TAG_NAME = 'AXL';
    public const SOURCE_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/4198';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel() : string
    {
        return 'Archive XL';
    }

    public function getSourceURL(): string
    {
        return self::SOURCE_URL;
    }
}
