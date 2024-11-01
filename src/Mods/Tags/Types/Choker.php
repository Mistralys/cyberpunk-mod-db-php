<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Choker extends BaseTagInfo
{
    public const TAG_NAME = 'Choker';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Neck choker';
    }
    
    public function getCategory(): string
    {
        return 'Clothing items';
    }
}
