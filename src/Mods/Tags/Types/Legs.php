<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Legs extends BaseTagInfo
{
    public const TAG_NAME = 'Legs';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Leg slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
}
