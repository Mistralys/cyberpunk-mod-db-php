<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Indexing;

use CPMDBTEsts\TestClasses\CPMDBTestCase;
use CPMDBTests\TestClasses\FilterAssertionsInterface;
use CPMDBTests\TestClasses\FilterAssertionsTrait;

final class ItemFilteringTests extends CPMDBTestCase implements FilterAssertionsInterface
{
    use FilterAssertionsTrait;

    public function test_filterBySingleTag(): void
    {
        $filters = $this->createCollection()
            ->createItemFilter()
            ->selectSearchTerm('catsuit');

        $this->assertResultsContainPrimaryID('clothing.catsuit.cat_top', $filters);
    }

    public function test_filterByAuthor() : void
    {
        $filters = $this->createCollection()
            ->createItemFilter()
            ->selectAuthor('PeachuHime');

        $this->assertResultsContainPrimaryID('clothing.comfy-set.peachu_comfytop_black', $filters);

        foreach($filters->getItems() as $item) {
            $this->assertContains('PeachuHime', $item->getAuthors());
        }
    }

    public function test_filterByCategoryLabel() : void
    {
        $filters = $this->createCollection()
            ->createItemFilter()
            ->selectSearchTerm('Bicep Monitors');

        $this->assertResultsContainPrimaryID('clothing.bicep-biomonitor.caibro_monitor_default', $filters);
    }
}
