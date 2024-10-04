<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

class BodyHystAngel extends BodyHyst
{
    public const TAG_NAME = 'Body-Hyst-Angel';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Hyst Angel';
    }
}
