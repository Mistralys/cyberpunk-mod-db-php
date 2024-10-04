<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

class BodyHystEBBPRB extends BodyHyst
{
    public const TAG_NAME = 'Body-Hyst-EBBPRB';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Hyst EBBPRB';
    }
}
