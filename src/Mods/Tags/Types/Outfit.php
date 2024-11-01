<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Outfit extends BaseTagInfo
{
    public const TAG_NAME = 'Outfit';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Set of clothing items for a full-themed outfit';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
