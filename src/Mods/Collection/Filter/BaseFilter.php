<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use CPMDB\Mods\Collection\Indexer\IndexInterface;
use CPMDB\Mods\Collection\Indexer\ModIndex;
use CPMDB\Mods\Collection\ModCollection;
use Loupe\Loupe\SearchParameters;

abstract class BaseFilter implements FilterInterface
{
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

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
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

    public function selectSearchTerm(string $term, bool $exactPhrase=false) : self
    {
        $term = trim($term);

        if(empty($term)) {
            return $this;
        }

        if($exactPhrase) {
            $term = sprintf('"%s"', $term);
        }

        if(!empty($term) && !in_array($term, $this->terms)) {

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

    /**
     * @return array<int,array<string,mixed>>
     */
    public function getRawResults() : array
    {
        if(isset($this->results)) {
            return $this->results;
        }

        $results = $this
            ->getSearchIndex()
            ->getSearchInstance()
            ->search($this->applyFilters())
            ->toArray();

        $this->results = $results['hits'] ?? array();

        return $this->results;
    }

    abstract public function getSearchIndex() : IndexInterface;

    private function applyFilters() : SearchParameters
    {
        $criteria = SearchParameters::create()
            ->withAttributesToRetrieve(array($this->getSearchIndex()->getPrimaryKeyName()));

        if(!empty($this->terms)) {
            $criteria = $criteria->withQuery(implode(' ', $this->terms));
        }

        $filters = array();

        if(!empty($this->tags)) {
            $filters[] = sprintf(
                "%s IN('%s')",
                ModIndex::KEY_MOD_TAGS,
                implode("','", $this->tags)
            );
        }

        $this->appendFilters($filters);

        $query = implode(' AND ', $filters);

        if(!empty($query)) {
            $criteria = $criteria->withFilter($query);
        }

        return $criteria;
    }

    abstract protected function appendFilters(array &$filters) : void;

    /**
     * @return string[]
     */
    public function getPrimaryIDs() : array
    {
        $ids = array();
        $primaryName = $this->getSearchIndex()->getPrimaryKeyName();

        foreach($this->getRawResults() as $result) {
            $ids[] = $result[$primaryName];
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
}
