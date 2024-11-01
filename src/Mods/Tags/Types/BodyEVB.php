<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyEVB extends BaseTagInfo
{
    public const TAG_NAME = 'Body-EVB';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Enhanced Vanilla Body; No refits needed';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
}
