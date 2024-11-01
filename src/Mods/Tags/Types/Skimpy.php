<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Skimpy extends BaseTagInfo
{
    public const TAG_NAME = 'Skimpy';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Clothing items that are revealing';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
