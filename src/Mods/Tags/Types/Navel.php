<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Navel extends BaseTagInfo
{
    public const TAG_NAME = 'Navel';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Navel slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
}
