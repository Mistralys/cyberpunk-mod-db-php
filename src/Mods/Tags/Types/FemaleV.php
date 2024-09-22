<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\BodyTypeTagInfo;

class FemaleV extends BodyTypeTagInfo
{
    public const TAG_NAME = 'FemV';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Female V';
    }
}
