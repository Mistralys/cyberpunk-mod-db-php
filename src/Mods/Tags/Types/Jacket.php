<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Jacket extends BaseTagInfo
{
    public const TAG_NAME = 'Jacket';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Jacket, Blazer, Bolero';
    }
    
    public function getCategory(): string
    {
        return 'Clothing items';
    }
}
