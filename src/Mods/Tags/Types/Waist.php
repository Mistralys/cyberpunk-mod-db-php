<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Waist extends BaseTagInfo
{
    public const TAG_NAME = 'Waist';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Waist slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
}
