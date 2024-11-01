<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyAtlas extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Atlas';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'High poly body with hand-sculpted muscles';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - MaleV';
    }
}
