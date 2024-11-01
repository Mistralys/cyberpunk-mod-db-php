<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Holo extends BaseTagInfo
{
    public const TAG_NAME = 'Holo';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Holographic items';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
