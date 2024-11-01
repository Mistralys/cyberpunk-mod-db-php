<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Leggings extends BaseTagInfo
{
    public const TAG_NAME = 'Leggings';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Leggings, stretch pants';
    }
    
    public function getCategory(): string
    {
        return 'Clothing items';
    }
}
