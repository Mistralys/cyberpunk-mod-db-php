<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

interface FilterInterface
{
    public function hasFilters() : bool;
    public function selectSearchTerm(string $term, bool $exactPhrase=false) : self;
    /**
     * @param string[] $terms
     * @return $this
     */
    public function selectSearchTerms(array $terms) : self;
    /**
     * @return array<int,array<string,mixed>>
     */
    public function getRawResults() : array;

    /**
     * @return string[]
     */
    public function getPrimaryIDs() : array;
}
