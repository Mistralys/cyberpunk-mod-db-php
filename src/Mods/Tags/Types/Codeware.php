<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\ModTagInfo;

class Codeware extends ModTagInfo
{
    public const TAG_NAME = 'CDW';
    public const SOURCE_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/7780';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel() : string
    {
        return 'Codeware';
    }

    public function getSourceURL() : string
    {
        return self::SOURCE_URL;
    }
}
