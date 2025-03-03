<?php
/**
 * @package CPMDB
 * @subpackage Filtering
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use CPMDB\Mods\Collection\Indexer\IndexInterface;
use CPMDB\Mods\Collection\ModCollectionInterface;

/**
 * Interface for classes that filter search results.
 * A base implementation is provided in {@see BaseFilter}.
 *
 * @package CPMDB
 * @subpackage Filtering
 */
interface FilterInterface
{
    /**
     * Whether any filter criteria have been selected.
     * @return bool
     */
    public function hasFilters() : bool;

    /**
     * Adds a single search term to the search.
     * @param string $term
     * @param bool $exactPhrase
     * @return self
     */
    public function selectSearchTerm(string $term, bool $exactPhrase=false) : self;

    /**
     * Adds terms to the search.
     *
     * @param string[] $terms
     * @return $this
     */
    public function selectSearchTerms(array $terms) : self;

    /**
     * Gets all results from the search.
     * @return array<int,array<string,mixed>> An array of associative arrays containing the UUID of the matching items.
     */
    public function getRawResults() : array;

    /**
     * @return string[]
     */
    public function getPrimaryIDs() : array;

    /**
     * Sets the number of results to show per page.
     *
     * @param int|null $amount Set to null to revert to the filter's default amount.
     * @return self
     */
    public function setResultsPerPage(?int $amount) : self;

    /**
     * Counts the total number of results (filtered).
     *
     * > TIP: Use the collection's {@see ModCollectionInterface::countRecords()}
     * > method to get the total number of records in the collection.
     *
     * @return int
     */
    public function countResults() : int;

    /**
     * Selects the page of the results to fetch.
     *
     * Use {@see getPagination()} to get the pagination object
     * and information on the total number of pages and more.
     *
     * @param int|null $page
     * @return self
     */
    public function selectResultPage(?int $page) : self;

    /**
     * Gets the object used to handle the result pagination.
     * It's also a general-purpose pagination helper.
     *
     * @return FilterPagination
     */
    public function getPagination() : FilterPagination;

    /**
     * Gets the filter's default number of results per page.
     * @return int
     */
    public function getDefaultResultsPerPage() : int;

    public function getSearchIndex() : IndexInterface;
}
