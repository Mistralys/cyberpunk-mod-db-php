<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Physics extends BaseTagInfo
{
    public const TAG_NAME = 'Physics';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Items with working physics';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
