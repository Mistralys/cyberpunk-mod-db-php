<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Indexing;

use CPMDBTEsts\TestClasses\CPMDBTestCase;
use CPMDBTests\TestClasses\FilterAssertionsTrait;

final class ItemFilteringTests extends CPMDBTestCase
{
    use FilterAssertionsTrait;

    public function test_filterBySingleTag(): void
    {
        $filters = $this->createCollection()
            ->createItemFilter()
            ->selectSearchTerm('catsuit');

        $this->assertResultsContainPrimaryID('clothing.catsuit.cat_top', $filters);
    }
}
