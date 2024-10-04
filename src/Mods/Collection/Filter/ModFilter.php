<?php
/**
 * @package CPMDB
 * @subpackage Filtering
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use AppUtils\Collections\CollectionException;
use CPMDB\Mods\Clothing\ClothingModInfo;
use CPMDB\Mods\Collection\Indexer\IndexInterface;
use CPMDB\Mods\Collection\Indexer\ModIndex;
use CPMDB\Mods\Mod\ModInfoInterface;
use Loupe\Loupe\SearchParameters;

/**
 * Utility class used to search for mods in the collection
 * by selecting filter criteria like tags and/or search terms.
 *
 * ## Usage
 *
 * 1. Use the collection's {@see ModCollection::createFilter()}
 *    method to get an instance of this class.
 * 2. Use the {@see self::selectTag()} and {@see self::selectSearchTerm()}
 *    methods to add filter criteria.
 * 3. Use the {@see self::getMods()} method to get the mods
 *    that match the filter criteria.
 *
 * @package CPMDB
 * @subpackage Filtering
 */
class ModFilter extends BaseFilter
{
    public const SEARCHABLE_ATTRIBUTES = array(
        ModIndex::KEY_MOD_NAME,
        ModIndex::KEY_MOD_CATEGORY,
        ModIndex::KEY_MOD_AUTHORS
    );

    public const FILTERABLE_ATTRIBUTES = array(
        ModIndex::KEY_MOD_AUTHORS,
        ModIndex::KEY_MOD_TAGS
    );

    public const SORTABLE_ATTRIBUTES = array(
        ModIndex::KEY_MOD_NAME,
        ModIndex::KEY_MOD_CATEGORY
    );

    public function getSearchIndex(): IndexInterface
    {
        return $this->collection
            ->createIndexManager()
            ->getModIndex();
    }

    protected function _hasFilters(): bool
    {
        return false;
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
        return $this->getPrimaryIDs();
    }

    protected function resolveSearchParams(): SearchParameters
    {
        return parent::resolveSearchParams()
            ->withHitsPerPage(500);
    }

    protected function appendFilters(array &$filters) : void
    {

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

    protected function getTagsKeyName(): string
    {
        return ModIndex::KEY_MOD_TAGS;
    }
}
