<?php
/**
 * Functions used by the test suite and tools.
 *
 * @package CPMDB
 * @subpackage Tools
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tools;

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\ModCollection;
use function CPMDB\Assets\getCLICommands;

/**
 * Creates a test collection used by the test cases
 * and internal tools.
 *
 * @package CPMDB
 * @subpackage Tools
 * @return ModCollection
 */
function createTestCollection(bool $newInstance=false) : ModCollection
{
    $key = '__test_cpmdb_mod_collection';

    if($newInstance && isset($GLOBALS[$key])) {
        return $GLOBALS[$key];
    }

    $collection = ModCollection::create(
        FolderInfo::factory(__DIR__.'/../vendor'),
        FolderInfo::factory(__DIR__.'/../tests/cache'),
        'http://127.0.0.1/cpmdb'
    );

    if(!$newInstance) {
        $GLOBALS[$key] = $collection;
    }

    return $collection;
}

function getToolArg() : ?string
{
    $commands = array(
        'detect-missing-tags',
        'generate-atelier-classes',
        'generate-tag-names',
    );

    foreach(getCLICommands() as $command => $value) {
        if(in_array($command, $commands)) {
            return $command;
        }
    }

    return null;
}
