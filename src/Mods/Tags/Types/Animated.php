<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class Animated extends GeneralTagInfo
{
    public const TAG_NAME = 'Animated';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Animated textures';
    }
}