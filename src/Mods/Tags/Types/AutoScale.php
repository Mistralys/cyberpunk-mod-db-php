<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class AutoScale extends BaseTagInfo
{
    public const TAG_NAME = 'AutoScale';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Clothing that automatically scales to the player\'s level';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
