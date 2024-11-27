<?php

declare(strict_types=1);

namespace CPMDB\Tools;

use function CPMDB\Assets\logError;
use function CPMDB\Mods\Tools\generateAtelierClasses;
use function CPMDB\Mods\Tools\generateAtelierCollectionClass;
use function CPMDB\Mods\Tools\generateAteliersEnumClass;
use function CPMDB\Mods\Tools\getToolArg;

require_once __DIR__ . '/../vendor/autoload.php';

switch(getToolArg())
{
    case 'detect-missing-tags':
        generateTagClasses();
        break;

    case 'generate-atelier-classes':
        generateAtelierClasses();
        generateAtelierCollectionClass();
        generateAteliersEnumClass();
        break;

    case 'generate-tag-names':
        generateTagsEnumClass();
        break;

    default:
        logError('Unknown tool argument.');
        break;
}
