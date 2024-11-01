<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Arms extends BaseTagInfo
{
    public const TAG_NAME = 'Arms';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Arms slot';
    }
    
    public function getCategory(): string
    {
        return 'Clothing slots';
    }
}
