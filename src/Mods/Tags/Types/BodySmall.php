<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

class BodySmall extends BodySolo
{
    public const TAG_NAME = 'Body-Small';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'KS Solo Small';
    }
}
