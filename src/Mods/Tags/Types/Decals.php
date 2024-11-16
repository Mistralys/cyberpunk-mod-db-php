<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Decals extends BaseTagInfo
{
    public const TAG_NAME = 'Decals';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Decals or stickers to use on clothing items';
    }
    
    public function getCategory(): string
    {
        return 'Clothing items';
    }
}
