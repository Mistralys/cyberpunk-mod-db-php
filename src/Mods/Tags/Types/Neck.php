<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Neck extends BaseTagInfo
{
    public const TAG_NAME = 'Neck';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Neck slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
}
