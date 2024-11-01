<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyHystEBBPRB extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Hyst-EBBPRB';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'EBBPRB - Enhanced Big Breasts, Push-Up and Realistic Butt';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
}
