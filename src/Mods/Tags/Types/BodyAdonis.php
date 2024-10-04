<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\BodyModTagInfo;

class BodyAdonis extends BodyModTagInfo
{
    public const TAG_NAME = 'Body-Adonis';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Adonis';
    }

    public function getSourceURL(): string
    {
        return 'https://www.nexusmods.com/cyberpunk2077/mods/4968';
    }
}
