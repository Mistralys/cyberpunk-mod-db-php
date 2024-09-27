<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Collection;

use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class CacheTests extends CPMDBTestCase
{
    public function test_cacheDisabled() : void
    {
        $this->assertFalse(CacheDataWriter::isCacheEnabled());

        $this->assertFileDoesNotExist(CacheDataWriter::resolveCacheFile($this->getCacheFolder())->getPath());
    }

    public function test_writeCache() : void
    {
        CacheDataWriter::setCacheEnabled(true);

        $cacheFile = CacheDataWriter::resolveCacheFile($this->getCacheFolder())->getPath();

        $this->createCollection()->writeCache();

        $this->assertFileExists($cacheFile);

        $modified = filemtime($cacheFile);

        // Wait a little to ensure that the file modified time would change
        // if the cache is written again.
        usleep(40);

        $this->createCollection()->writeCache();

        $this->assertSame($modified, filemtime($cacheFile), 'The cache file must not be modified if it already exists.');
    }

    public function test_cacheHasSameAmountMods() : void
    {
        CacheDataWriter::setCacheEnabled(true);

        // This collection does not use the cache yet
        $collectionA = $this->createCollection();
        $this->assertFalse($collectionA->isLoadedFromCache());

        // Create the cache
        $collectionA->writeCache();

        // This collection uses the cache
        $collectionB = $this->createCollection();
        $this->assertTrue($collectionB->isLoadedFromCache());

        $this->assertSameSize($collectionA->getAll(), $collectionB->getAll());
    }
}
