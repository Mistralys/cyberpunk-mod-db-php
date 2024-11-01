<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Transparent extends BaseTagInfo
{
    public const TAG_NAME = 'Transparent';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Items with transparency';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
