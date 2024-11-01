<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Clothing extends BaseTagInfo
{
    public const TAG_NAME = 'Clothing';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Clothing items';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
