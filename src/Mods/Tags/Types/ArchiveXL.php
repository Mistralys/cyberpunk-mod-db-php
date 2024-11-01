<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class ArchiveXL extends BaseTagInfo
{
    public const TAG_NAME = 'AXL';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'ArchiveXL - Modder resource';
    }
    
    public function getCategory(): string
    {
        return 'Mods';
    }
}
