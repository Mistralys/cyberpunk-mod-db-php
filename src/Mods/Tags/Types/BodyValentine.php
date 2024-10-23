<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class BodyValentine extends GeneralTagInfo
{
    public const TAG_NAME = 'Body-Valentine';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Body-Valentine';
    }
}
