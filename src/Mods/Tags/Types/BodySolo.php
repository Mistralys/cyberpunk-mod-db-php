<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\BodyModTagInfo;

class BodySolo extends BodyModTagInfo
{
    public const TAG_NAME = 'Body-Solo';
    public const SOURCE_URL = 'https://www.nexusmods.com/cyberpunk2077/mods/4813';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'KS Solo body';
    }

    public function getSourceURL(): string
    {
        return self::SOURCE_URL;
    }
}
