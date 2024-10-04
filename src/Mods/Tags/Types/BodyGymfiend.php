<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\BodyModTagInfo;

class BodyGymfiend extends BodyModTagInfo
{
    public const TAG_NAME = 'Body-Gymfiend';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Body-Gymfiend';
    }

    public function getSourceURL(): string
    {
        return 'https://www.nexusmods.com/cyberpunk2077/mods/6423';
    }
}
