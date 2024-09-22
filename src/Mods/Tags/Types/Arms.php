<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\ItemSlotTag;

class Arms extends ItemSlotTag
{
    public const TAG_NAME = 'Arms';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Arm slots';
    }
}
