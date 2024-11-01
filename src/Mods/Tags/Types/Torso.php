<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Torso extends BaseTagInfo
{
    public const TAG_NAME = 'Torso';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Torso slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
}
