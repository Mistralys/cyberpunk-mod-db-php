<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Shorts extends BaseTagInfo
{
    public const TAG_NAME = 'Shorts';

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
