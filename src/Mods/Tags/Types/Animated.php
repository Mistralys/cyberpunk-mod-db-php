<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Animated extends BaseTagInfo
{
    public const TAG_NAME = 'Animated';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Animated clothing parts';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
