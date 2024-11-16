<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyFlat extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Flat';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Flat chested body';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
}
