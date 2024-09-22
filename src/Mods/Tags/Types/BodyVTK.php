<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\BodyModTagInfo;

class BodyVTK extends BodyModTagInfo
{
    public const TAG_NAME = 'Body-VTK';
    public const SOURCE_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/7054';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'VTK Framework Body';
    }

    public function getSourceURL(): string
    {
        return self::SOURCE_URL;
    }
}
