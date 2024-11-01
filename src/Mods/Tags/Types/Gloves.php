<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Gloves extends BaseTagInfo
{
    public const TAG_NAME = 'Gloves';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return '';
    }
    
    public function getCategory(): string
    {
        return 'Clothing items';
    }
}
