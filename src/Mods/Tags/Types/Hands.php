<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Hands extends BaseTagInfo
{
    public const TAG_NAME = 'Hands';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Hand slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
}
