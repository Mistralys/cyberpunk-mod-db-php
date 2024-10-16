<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class BodyVTKVanillaHD extends GeneralTagInfo
{
    public const TAG_NAME = 'Body-VTK-VanillaHD';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Body-VTK-VanillaHD';
    }
}
