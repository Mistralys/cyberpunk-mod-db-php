<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Collection;

use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class CollectionTests extends CPMDBTestCase
{
    public function test_create() : void
    {
        $collection = $this->createCollection();

        $this->assertTrue($collection->getDataFolder()->exists());
    }

    public function test_getAll() : void
    {
        $collection = $this->createCollection();

        $mods = $collection->getAll();

        $this->assertNotEmpty($mods);
    }
}
