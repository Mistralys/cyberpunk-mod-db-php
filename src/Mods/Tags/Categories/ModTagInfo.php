<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Categories;

use CPMDB\Mods\Tags\BaseTagInfo;

abstract class ModTagInfo extends BaseTagInfo
{
    public function getCategory() : string
    {
        return 'Mod';
    }

    abstract public function getSourceURL() : string;
}
