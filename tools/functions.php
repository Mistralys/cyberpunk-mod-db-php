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
        getTestInstallURL().'/vendor'
    );

    if(!$newInstance) {
        $GLOBALS[$key] = $collection;
    }

    return $collection;
}

function getTestInstallURL() : string
{
    loadConfig();

    return \CPMDB_INSTALL_URL;
}

function loadConfig() : void
{
    $key = '__test_cpmdb_config_loaded';
    if(isset($GLOBALS[$key])) {
        return;
    }

    $GLOBALS[$key] = true;

    if(file_exists(__DIR__.'/../config.php')) {
        require_once __DIR__.'/../config.php';
    } else {
        define('CPMDB_INSTALL_URL', 'http://127.0.0.1/cpmdb');
    }
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

/**
 * Renders a list of use statements.
 * @param string[] $uses Namespaced class names without the `use` keyword.
 * @return string
 */
function renderUses(array $uses) : string
{
    if(empty($uses)) {
        return '';
    }

    return PHP_EOL.'use '.implode(';'.PHP_EOL.'use ', $uses).';'.PHP_EOL;
}
