<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Bra extends BaseTagInfo
{
    public const TAG_NAME = 'Bra';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Bra or bra-like';
    }
    
    public function getCategory(): string
    {
        return 'Clothing items';
    }
}
