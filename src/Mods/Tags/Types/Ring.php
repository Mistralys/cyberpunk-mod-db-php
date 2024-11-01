<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Ring extends BaseTagInfo
{
    public const TAG_NAME = 'Ring';

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
