<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Indexing;

use CPMDBTEsts\TestClasses\CPMDBTestCase;

class IndexBuilderTests extends CPMDBTestCase
{
    public function test_indexing() : void
    {
        $manager = $this->createCollection()->createIndexManager();

        $this->assertFalse($manager->isIndexValid());

        $modIndex = $manager->getModIndex();

        $this->assertDirectoryExists((string)$modIndex->getDataFolder());
        $this->assertTrue($modIndex->isValid());
    }

    public function test_findRecords() : void
    {
        $collection = $this->createCollection();
        $manager = $collection->createIndexManager();

        $this->assertSame(
            $collection->countRecords(),
            $manager->getModIndex()->getSearchInstance()->countDocuments()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->createCollection()->createIndexManager()->clearIndex();
    }
}
