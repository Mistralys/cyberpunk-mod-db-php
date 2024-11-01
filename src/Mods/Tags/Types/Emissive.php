<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Emissive extends BaseTagInfo
{
    public const TAG_NAME = 'Emissive';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Clothing items that glow or emit light in some way';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
