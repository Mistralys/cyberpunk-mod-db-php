<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Indexing;

use CPMDBTEsts\TestClasses\CPMDBTestCase;

class IndexBuilderTests extends CPMDBTestCase
{
    public function test_indexing() : void
    {
        $manager = $this->createCollection()->createIndexManager();

        $manager->buildIndex();

        $this->assertDirectoryExists((string)$manager->getDataDir());
    }

    public function test_findRecords() : void
    {
        $collection = $this->createCollection();
        $manager = $collection->createIndexManager();
        $manager->buildIndex();

        $this->assertSame(
            $collection->countRecords(),
            $manager->getIndex()->countDocuments()
        );
    }
}
