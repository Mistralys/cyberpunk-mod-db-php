<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class Modular extends BaseTagInfo
{
    public const TAG_NAME = 'Modular';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Modular clothing items that can be combined in different ways';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
