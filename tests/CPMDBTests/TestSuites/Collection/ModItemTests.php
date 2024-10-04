<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Collection;

use CPMDBTEsts\TestClasses\CPMDBTestCase;
use CPMDBTests\TestClasses\ItemCollectionAssertionsTrait;

final class ModItemTests extends CPMDBTestCase
{
    use ItemCollectionAssertionsTrait;

    public function test_hasExpectedAmountOfItems() : void
    {
        $collection = $this->createCollection()
            ->getByID('clothing.catsuit')
            ->getItemCollection();

        $this->assertSame(3, $collection->countRecords());
    }

    public function test_hasExpectedItemUUID() : void
    {
        $collection = $this->createCollection()
            ->getByID('clothing.catsuit')
            ->getItemCollection();

        $this->assertItemsContainUUID('clothing.catsuit.cat_top', $collection);
    }

    public function test_hasExpectedItemCode() : void
    {
        $collection = $this->createCollection()
            ->getByID('clothing.catsuit')
            ->getItemCollection();

        $this->assertItemsContainCode('cat_top', $collection);
    }

    public function test_getItemCategories() : void
    {
        $categories = $this->createCollection()
            ->getByID('clothing.biker-boots')
            ->getItemCollection()
            ->getCategories();

        $this->assertCount(2, $categories);
    }
}
