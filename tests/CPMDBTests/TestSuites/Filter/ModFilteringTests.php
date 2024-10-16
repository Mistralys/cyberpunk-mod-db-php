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
     * @link https://github.com/loupe-php/loupe/discussions/88
     */
    public function test_filterByPartialTerm() : void
    {
        $filters = $this->createCollection()->createFilter();

        $filters->selectSearchTerm('rayne');

        $this->markTestSkipped('Loupe does not support partial searches (see test PHPDoc)');

        //$this->assertResultsContainPrimaryID('clothing.blood-rayne', $filters);
    }

    public function test_filterByMultipleCriteria() : void
    {
        $filters = $this->createCollection()->createFilter();

        $filters->selectSearchTerms(array('xrx', 'jacket'));
        $filters->selectTag(Torso::TAG_NAME);

        $this->assertResultsContainPrimaryID('clothing.xrx-leather-jacket', $filters);
    }
}
