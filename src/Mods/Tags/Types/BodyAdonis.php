<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyAdonis extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Adonis';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Adonis: High-poly body with detailed musculature and definition';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - MaleV';
    }
}
