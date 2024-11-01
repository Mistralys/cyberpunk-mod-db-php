<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyVTKVanillaHD extends BaseTagInfo
{
    public const TAG_NAME = 'Body-VTK-VanillaHD';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'High quality body, requires no refits';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
}
