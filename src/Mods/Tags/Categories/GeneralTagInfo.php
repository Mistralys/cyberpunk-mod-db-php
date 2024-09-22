<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Categories;

use CPMDB\Mods\Tags\BaseTagInfo;

abstract class GeneralTagInfo extends BaseTagInfo
{
    public function getCategory(): string
    {
        return 'General';
    }
}
