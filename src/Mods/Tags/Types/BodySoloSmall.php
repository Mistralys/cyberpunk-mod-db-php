<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodySoloSmall extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Solo-Small';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Solo with small breasts';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
}
