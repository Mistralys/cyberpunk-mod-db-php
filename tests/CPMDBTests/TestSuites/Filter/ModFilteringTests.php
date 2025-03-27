<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Indexing;

use CPMDB\Mods\Tags\Types\Earring;
use CPMDB\Mods\Tags\Types\Jewelry;
use CPMDB\Mods\Tags\Types\MaleV;
use CPMDB\Mods\Tags\Types\Torso;
use CPMDBTEsts\TestClasses\CPMDBTestCase;
use CPMDBTests\TestClasses\FilterAssertionsInterface;
use CPMDBTests\TestClasses\FilterAssertionsTrait;

final class ModFilteringTests extends CPMDBTestCase implements FilterAssertionsInterface
{
    use FilterAssertionsTrait;

    public function test_filterBySingleTag() : void
    {
        $filters = $this->createCollection()
            ->createFilter()
            ->selectTag(Jewelry::TAG_NAME);

        $this->assertResultsContainPrimaryID('clothing.moon-and-star-earrings', $filters);
    }

    public function test_filterByModUUIDs() : void
    {
        $matches = $this->createCollection()
            ->createFilter()
            ->selectModUUID('clothing.moon-and-star-earrings')
            ->getMods();

        $this->assertCount(1, $matches);
        $this->assertSame('clothing.moon-and-star-earrings', $matches[0]->getUUID());
    }

    public function test_filterByModIDs() : void
    {
        $matches = $this->createCollection()
            ->createFilter()
            ->selectModID('moon-and-star-earrings')
            ->getMods();

        $this->assertCount(1, $matches);
        $this->assertSame('clothing.moon-and-star-earrings', $matches[0]->getUUID());
    }

    public function test_filterByMultipleTags() : void
    {
        $filters = $this->createCollection()
            ->createFilter()
            ->selectTags(array(Earring::TAG_NAME, MaleV::TAG_NAME));

        $this->assertResultsContainPrimaryID('clothing.salander-earplugs', $filters);
    }

    public function test_filterBySearchTerms() : void
    {
        $filters = $this->createCollection()->createFilter();

        $filters->selectSearchTerm('fashionware');

        $this->assertResultsContainPrimaryID('clothing.full-body-fashionware', $filters);
    }

    /**
     * Loupe does not support partial searches: It only searches
     * from the beginning of terms. Something at the end of a term
     * will not be found.
     *
     * To solve this issue, mods can define the "searchTweaks" key
     * that contains the split part of words that Loupe cannot find.
     * An example is the "rayne" term in the "blood-rayne" mod.
     *
     * @link https://github.com/loupe-php/loupe/discussions/88
     */
    public function test_filterByPartialTerm() : void
    {
        $filters = $this->createCollection()->createFilter();

        $filters->selectSearchTerm('rayne');

        $this->assertResultsContainPrimaryID('clothing.blood-rayne', $filters);
    }

    public function test_filterByMultipleCriteria() : void
    {
        $filters = $this->createCollection()->createFilter();

        $filters->selectSearchTerms(array('xrx', 'jacket'));
        $filters->selectTag(Torso::TAG_NAME);

        $this->assertResultsContainPrimaryID('clothing.xrx-leather-jacket', $filters);
    }

    public function test_filterPagination() : void
    {
        $filters = $this->createCollection()->createFilter();

        $filters->setResultsPerPage(6);

        $result = $filters->getLoupeResult();

        $this->assertArrayHasKey('hits', $result);
        $this->assertCount(6, $result['hits']);
        $this->assertTrue($result['totalPages'] > 1);
    }

    public function test_filterPaginationSelectPage() : void
    {
        $filters = $this->createCollection()->createFilter();

        $filters->setResultsPerPage(6);
        $filters->selectResultPage(2);

        $result = $filters->getLoupeResult();

        $this->assertArrayHasKey('hits', $result);
        $this->assertArrayHasKey('page', $result);
        $this->assertCount(6, $result['hits']);
        $this->assertSame(2, $result['page']);
        $this->assertTrue($result['totalPages'] > 1);
    }
}
