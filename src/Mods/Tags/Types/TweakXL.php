<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class TweakXL extends BaseTagInfo
{
    public const TAG_NAME = 'TXL';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Tweak XL - Tweak XL: Modder resource';
    }
    
    public function getCategory(): string
    {
        return 'Mods';
    }
}
