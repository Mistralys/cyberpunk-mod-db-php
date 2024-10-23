<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class BodySoloSmall extends GeneralTagInfo
{
    public const TAG_NAME = 'Body-Solo-Small';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Body-Solo-Small';
    }
}
