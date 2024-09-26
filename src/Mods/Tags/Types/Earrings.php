<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class Earrings extends GeneralTagInfo
{
    public const TAG_NAME = 'Earrings';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Earrings';
    }
}
