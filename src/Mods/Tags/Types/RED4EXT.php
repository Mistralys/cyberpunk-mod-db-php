<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Red4Ext extends BaseTagInfo
{
    public const TAG_NAME = 'R4EX';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Red4Ext - Modder resource';
    }
    
    public function getCategory(): string
    {
        return 'Mods';
    }
}
