<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class BodyHystEBBP extends BodyHyst
{
    public const TAG_NAME = 'Body-Hyst-EBBP';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Hyst EBBP';
    }
}
