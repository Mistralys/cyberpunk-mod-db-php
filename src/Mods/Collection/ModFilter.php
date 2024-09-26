<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use AppUtils\Collections\CollectionException;
use CPMDB\Mods\Clothing\ClothingModInfo;
use CPMDB\Mods\Collection\Indexer\IndexBuilder;
use CPMDB\Mods\Mod\ModInfoInterface;
use Loupe\Loupe\SearchParameters;

class ModFilter
{
    private ModCollection $collection;

    /**
     * @var string[]
     */
    private array $tags = array();

    /**
     * @var string[]
     */
    private array $terms = array();

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
    }

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

    private function resetResults() : void
    {
        $this->results = null;
    }

    /**
     * @var array<int,array<string,mixed>>|null
     */
    private ?array $results = null;

    /**
     * @return array<int,array<string,mixed>>
     */
    public function getRawResults() : array
    {
        if(isset($this->results)) {
            return $this->results;
        }

        $results = $this->collection
            ->createIndexManager()
            ->getIndex()
            ->search($this->applyFilters())
            ->toArray();

        $this->results = $results['hits'] ?? array();

        return $this->results;
    }

    public function hasFilters() : bool
    {
        return !empty($this->tags) || !empty($this->terms);
    }

    /**
     * @return ModInfoInterface[]
     * @throws CollectionException
     */
    public function getMods() : array
    {
        $mods = array();

        foreach($this->getModIDs() as $id) {
            $mods[] = $this->collection->getByID($id);
        }

        return $mods;
    }

    /**
     * @return string[]
     */
    public function getModIDs() : array
    {
        $ids = array();

        foreach($this->getRawResults() as $result) {
            $ids[] = $result[IndexBuilder::KEY_UUID];
        }

        return $ids;
    }

    private function applyFilters() : SearchParameters
    {
        $criteria = SearchParameters::create()
            ->withAttributesToRetrieve(array(IndexBuilder::KEY_UUID));

        if(!empty($this->terms)) {
            $criteria = $criteria->withQuery(implode(' ', $this->terms));
        }

        $filters = array();

        if(!empty($this->tags)) {
            $filters[] = sprintf(
                "%s IN('%s')",
                IndexBuilder::KEY_TAGS,
                implode("','", $this->tags)
            );
        }

        $query = implode(' AND ', $filters);

        if(!empty($query)) {
            $criteria = $criteria->withFilter($query);
        }

        return $criteria;
    }

    /**
     * @return ClothingModInfo[]
     */
    public function getClothing() : array
    {
        $result = array();

        foreach($this->getMods() as $mod) {
            if($mod instanceof ClothingModInfo) {
                $result[] = $mod;
            }
        }

        return $result;
    }
}
