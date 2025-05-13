<?php


declare(strict_types=1);

namespace CPMDB\Mods\Tools;

use function CPMDB\Tools\generateTagClasses;
use function CPMDB\Tools\generateTagsEnumClass;

function buildRelease() : void
{
    generateTagClasses();
    generateAtelierClasses();
    generateAtelierCollectionClass();
    generateAteliersEnumClass();
    generateTagsEnumClass();
}
