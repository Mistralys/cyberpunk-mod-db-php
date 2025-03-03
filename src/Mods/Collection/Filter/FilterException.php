<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use CPMDB\Mods\Collection\ModCollectionException;

class FilterException extends ModCollectionException
{
    public const ERROR_MISSING_TOTAL_HITS = 173801;
}
