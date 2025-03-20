<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use CPMDB\CPMDBException;

class ModException extends CPMDBException
{
    public const ERROR_CATEGORY_NOT_FOUND = 176001;
}
