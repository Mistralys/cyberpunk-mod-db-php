<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class BodyHystEBBRB extends BodyHyst
{
    public const TAG_NAME = 'Body-Hyst-EBBRB';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Hyst EBBRB';
    }
}
