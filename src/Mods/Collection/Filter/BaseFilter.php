<?php
/**
 * @package CPMDB
 * @subpackage Filtering
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use AppUtils\PaginationHelper;
use CPMDB\Mods\Collection\Indexer\ModIndex;
use CPMDB\Mods\Collection\ModCollection;
use Loupe\Loupe\SearchParameters;

/**
 * Abstract base class for filter classes that
 * implement the {@see FilterInterface} interface.
 *
 * @package CPMDB
 * @subpackage Filtering
 */
abstract class BaseFilter implements FilterInterface
{
    private const LIST_MODE_AND = 'AND';
    private const LIST_MODE_OR = 'OR';
    const LOUPE_KEY_TOTAL_HITS = 'totalHits';
    const LOUPE_KEY_HITS = 'hits';

    protected ModCollection $collection;

    /**
     * @var string[]
     */
    private array $terms = array();

    /**
     * @var array<int,array<string,mixed>>|null
     */
    private ?array $results = null;

    /**
     * @var string[]
     */
    private array $tags = array();

    /**
     * @var string[]
     */
    private array $authors = array();

    private string $tagsMode = self::LIST_MODE_AND;
    private string $authorsMode = self::LIST_MODE_AND;
    private ?PaginationHelper $paginationHelper = null;
    private ?int $resultsPerPage = null;
    private ?int $page = null;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
    }

    public function setResultsPerPage(?int $amount) : self
    {
        $this->resultsPerPage = $amount;
        return $this;
    }

    public function getPagination() : FilterPagination
    {
        if(!isset($this->paginationHelper)) {
            $this->paginationHelper = new FilterPagination(
                $this,
                $this->countResults(),
                $this->resultsPerPage ?? $this->getDefaultResultsPerPage()
            );

            if(isset($this->page)) {
                $this->paginationHelper->setCurrentPage($this->page);
            }
        }

        return $this->paginationHelper;
    }

    public function hasFilters() : bool
    {
        return !empty($this->terms) || !empty($this->tags) || $this->_hasFilters();
    }

    /**
     * Check for custom filter criteria.
     * @return bool
     */
    abstract protected function _hasFilters() : bool;

    /**
     * @param string $term
     * @param bool $exactPhrase
     * @return $this
     */
    public function selectSearchTerm(string $term, bool $exactPhrase=false) : self
    {
        $term = trim($term);

        if(empty($term)) {
            return $this;
        }

        if($exactPhrase) {
            $term = sprintf('"%s"', $term);
        }

        if(!in_array($term, $this->terms)) {
            $this->terms[] = $term;
            $this->resetResults();
        }

        return $this;
    }

    /**
     * @param string[] $terms
     * @return $this
     */
    public function selectSearchTerms(array $terms) : self
    {
        foreach($terms as $term) {
            $this->selectSearchTerm($term);
        }

        return $this;
    }

    protected function resetResults() : void
    {
        $this->results = null;
    }

    public function countResults() : int
    {
        $result = $this->getLoupeResult(true);

        if(isset($result[self::LOUPE_KEY_TOTAL_HITS])) {
            return (int)$result[self::LOUPE_KEY_TOTAL_HITS];
        }

        throw new FilterException(
            'The search result does not contain a total hit count.',
            sprintf(
                'The result array is missing the key [%s]. '.PHP_EOL.
                'The result array has the following keys: '.PHP_EOL.
                '- %s',
                self::LOUPE_KEY_TOTAL_HITS,
                implode(PHP_EOL.'- ', array_keys($result))
            ),
            FilterException::ERROR_MISSING_TOTAL_HITS
        );
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    public function getRawResults() : array
    {
        if(isset($this->results)) {
            return $this->results;
        }

        $results = $this->getLoupeResult();

        $this->results = $results[self::LOUPE_KEY_HITS];

        return $this->results;
    }

    public function selectResultPage(?int $page) : self
    {
        $this->page = $page;
        if(isset($this->paginationHelper)) {
            $this->paginationHelper->setCurrentPage($page);
        }

        return $this;
    }

    /**
     * Gets the search result array directly from the Loupe search engine
     * for the selected filter criteria.
     *
     * @param bool $count Is this a count request to fetch the total number of filtered items?
     * @return array<string,mixed>
     */
    public function getLoupeResult(bool $count=false) : array
    {
        return $this
            ->getSearchIndex()
            ->getSearchInstance()
            ->search($this->resolveSearchParams($count))
            ->toArray();
    }

    protected function resolveSearchParams(bool $count=false) : SearchParameters
    {
        $params = $this->applyFilters();

        // Do not configure the pagination when counting results,
        // as this would lead to an endless loop (the paginated
        // results need the count without pagination).
        if($count) {
            return $params;
        }

        $pagination = $this->getPagination();

        return $params
            ->withPage($pagination->getCurrentPage())
            ->withHitsPerPage($pagination->getItemsPerPage());
    }

    private function applyFilters() : SearchParameters
    {
        $criteria = SearchParameters::create()
            ->withAttributesToRetrieve(array($this->getSearchIndex()->getPrimaryKeyName()));

        if(!empty($this->terms)) {
            $criteria = $criteria->withQuery(implode(' ', $this->terms));
        }

        $filters = array();

        $this->appendTagFilters($filters);
        $this->appendAuthorFilters($filters);
        $this->appendFilters($filters);

        $query = implode(' AND ', $filters);

        if(!empty($query)) {
            $criteria = $criteria->withFilter($query);
        }

        return $criteria;
    }

    abstract protected function getTagsKeyName() : string;

    /**
     * @param string[] $filters
     * @return void
     */
    private function appendTagFilters(array &$filters) : void
    {
        if(empty($this->tags)) {
            return;
        }

        $filters[] = $this->renderListMode(
            $this->getTagsKeyName(),
            $this->tagsMode,
            $this->tags
        );
    }

    /**
     * @param string $keyName
     * @param string $mode
     * @param string[] $items
     * @return string
     */
    private function renderListMode(string $keyName, string $mode, array $items) : string
    {
        if($mode === self::LIST_MODE_OR) {
            return $this->renderListOR($keyName, $items);
        } else {
            return $this->renderListAND($keyName, $items);
        }
    }

    /**
     * @param string $keyName
     * @param string[] $items
     * @return string
     */
    private function renderListOR(string $keyName, array $items) : string
    {
        return sprintf(
            "%s IN('%s')",
            $keyName,
            implode("','", array_map('addslashes', $items))
        );
    }

    /**
     * @param string $keyName
     * @param string[] $items
     * @return string
     */
    private function renderListAND(string $keyName, array $items) : string
    {
        $list = array();
        foreach($items as $item) {
            $list[] = sprintf(
                "%s = '%s'",
                $keyName,
                addslashes($item)
            );
        }

        return sprintf(
            "(%s)",
            implode(' AND ', $list)
        );
    }

    /**
     * @param string[] $filters
     * @return void
     */
    private function appendAuthorFilters(array &$filters) : void
    {
        if(empty($this->authors)) {
            return;
        }

        $filters[] = $this->renderListMode(
            ModIndex::KEY_MOD_AUTHORS,
            $this->authorsMode,
            $this->authors
        );
    }

    /**
     * @param string[] $filters
     * @return void
     */
    abstract protected function appendFilters(array &$filters) : void;

    /**
     * @return string[]
     */
    public function getPrimaryIDs() : array
    {
        $ids = array();
        $primaryName = $this->getSearchIndex()->getPrimaryKeyName();

        foreach($this->getRawResults() as $result) {
            if(isset($result[$primaryName]) && is_scalar($result[$primaryName])) {
                $ids[] = (string)$result[$primaryName];
            }
        }

        return $ids;
    }

    /**
     * @param string $tag
     * @return $this
     */
    public function selectTag(string $tag) : self
    {
        if(!empty($tag) && !in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
            $this->resetResults();
        }

        return $this;
    }

    /**
     * @param string[] $tags
     * @return $this
     */
    public function selectTags(array $tags) : self
    {
        foreach ($tags as $tag) {
            $this->selectTag($tag);
        }

        return $this;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function selectAuthor(string $author) : self
    {
        if(!empty($author) && !in_array($author, $this->authors)) {
            $this->authors[] = $author;
            $this->resetResults();
        }

        return $this;
    }

    /**
     * @param string[] $authors
     * @return $this
     */
    public function selectAuthors(array $authors) : self
    {
        foreach ($authors as $author) {
            $this->selectAuthor($author);
        }

        return $this;
    }
}
