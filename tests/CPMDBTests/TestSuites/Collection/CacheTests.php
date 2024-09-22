<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Collection;

use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class CacheTests extends CPMDBTestCase
{
    public function test_writeCache() : void
    {
        CacheDataWriter::setCacheEnabled(true);

        $this->createCollection()->writeCache();

        $this->assertFileExists(CacheDataWriter::resolveCacheFile($this->getCacheFolder())->getPath());
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
