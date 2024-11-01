<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyHystEBBRB extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Hyst-EBBRB';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'EBBRB - Enhanced Big Breasts and Realistic Butt';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
}
