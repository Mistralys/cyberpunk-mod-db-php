<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Reflective extends BaseTagInfo
{
    public const TAG_NAME = 'Reflective';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Items with reflective surfaces';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
