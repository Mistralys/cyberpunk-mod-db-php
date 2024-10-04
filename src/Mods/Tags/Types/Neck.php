<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\ItemSlotTag;

class Neck extends ItemSlotTag
{
    public const TAG_NAME = 'Neck';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Neck';
    }
}