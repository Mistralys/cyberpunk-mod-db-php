<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodySpawn0 extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Spawn0';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Body with a large choice of sizes and CET in-game body swap';
    }
    
    public function getCategory(): string
    {
        return 'Mods - Body Mods - FemV';
    }
}
