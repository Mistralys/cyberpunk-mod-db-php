<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class BodySoloUltimate extends GeneralTagInfo
{
    public const TAG_NAME = 'Body-Solo-Ultimate';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Body-Solo-Ultimate';
    }
}
