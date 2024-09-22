<?php
/**
 * Performance test for loading data from the mod collection,
 * with and without cache enabled.
 *
 * Usage:
 *
 * ```
 * php performance-test.php
 * ```
 *
 * ## Conclusions
 *
 * 1. The cache is a lot faster than loading the mods from the
 * individual files. With 1.000 iterations, the cache was
 * consistently about 80% faster.
 *
 * 2. A serialized file is faster than a JSON file for the cache.
 * Not by very much (about 0.4 seconds for 1.000 iterations), but
 * every little bit helps.
 *
 * @package CPMDB
 * @subpackage Performance Tests
 */

declare(strict_types=1);

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;
use CPMDB\Mods\Collection\ModCollection;

require_once __DIR__.'/../bootstrap.php';

$cacheFolder = FolderInfo::factory(__DIR__.'/../cache');
$vendorFolder = FolderInfo::factory(__DIR__.'/../../vendor');

// Ensure that the cache exists
CacheDataWriter::clearCache($cacheFolder);
createCollection()->writeCache();

$iterations = 1000;
$totalTimeA = 0;
$totalTimeB = 0;

echo '----------------------------------------------'.PHP_EOL;
echo 'Running performance test...'.PHP_EOL;
echo '----------------------------------------------'.PHP_EOL;
echo PHP_EOL;

CacheDataWriter::setCacheEnabled(false);

echo '- Without cache...'.PHP_EOL;

for($i=0; $i<$iterations; $i++) {
    $timeStartA = microtime(true);
    $collection = createCollection()->getAll();
    $totalTimeA += microtime(true) - $timeStartA;
}

CacheDataWriter::setCacheEnabled(true);

echo '- With cache...'.PHP_EOL;

for($i=0; $i<$iterations; $i++) {
    $timeStartB = microtime(true);
    $collection = createCollection()->getAll();
    $totalTimeB += microtime(true) - $timeStartB;
}

echo PHP_EOL;
echo '----------------------------------------------'.PHP_EOL;
echo 'Iterations: '.$iterations.PHP_EOL;
echo 'Total time without cache: '.number_format($totalTimeA, 4).PHP_EOL;
echo 'Total time with cache: '.number_format($totalTimeB, 4).PHP_EOL;
echo 'Gain: '.number_format($totalTimeA - $totalTimeB, 4).PHP_EOL;

$percentage = ($totalTimeA - $totalTimeB) / $totalTimeA * 100;
echo 'Percentage gain: '.number_format($percentage, 2).'%'.PHP_EOL;

function createCollection() : ModCollection
{
    global $cacheFolder;
    global $vendorFolder;

    return ModCollection::create(
        $vendorFolder,
        $cacheFolder,
        'https://vendor'
    );
}
