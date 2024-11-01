<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Codeware extends BaseTagInfo
{
    public const TAG_NAME = 'CDW';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Codeware - Modder resource';
    }
    
    public function getCategory(): string
    {
        return 'Mods';
    }
}
