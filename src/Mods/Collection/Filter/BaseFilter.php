<?php
/**
 * @package CPMDB
 * @subpackage Filtering
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use CPMDB\Mods\Collection\Indexer\IndexInterface;
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
            ->search($this->resolveSearchParams())
            ->toArray();

        $this->results = $results['hits'];

        return $this->results;
    }

    protected function resolveSearchParams() : SearchParameters
    {
        return $this->applyFilters();
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
