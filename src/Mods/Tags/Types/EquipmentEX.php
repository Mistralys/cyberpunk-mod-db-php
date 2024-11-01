<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class EquipmentEX extends BaseTagInfo
{
    public const TAG_NAME = 'EQEX';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Equipment-EX - Layering of clothing items';
    }
    
    public function getCategory(): string
    {
        return 'Mods';
    }
}
