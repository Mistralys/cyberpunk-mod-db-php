<?php
/**
 * @package CPMDB
 * @subpackage Search Index
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Indexer;

use CPMDB\Mods\Collection\Filter\ModFilter;
use CPMDB\Mods\Mod\ModInfoInterface;
use Loupe\Loupe\Config\TypoTolerance;
use Loupe\Loupe\Configuration;
use Loupe\Loupe\Loupe;
use Loupe\Loupe\LoupeFactory;

/**
 * Builds the search index database for mods.
 *
 * @package CPMDB
 * @subpackage Search Index
 */
class ModIndex extends BaseIndex
{
    public const INDEX_TYPE = 'mod';

    public const KEY_MOD_CATEGORY = 'mod_category';
    public const KEY_MOD_NAME = 'mod_name';
    public const KEY_MOD_AUTHORS = 'mod_authors';
    public const KEY_MOD_UUID = 'mod_uuid';
    public const KEY_MOD_TAGS = 'mod_tags';
    public const KEY_MOD_SEARCH_TERMS = 'mod_search_terms';

    public function getID(): string
    {
        return self::INDEX_TYPE;
    }

    public function getPrimaryKeyName(): string
    {
        return self::KEY_MOD_UUID;
    }

    protected function createSearchInstance() : Loupe
    {
        return (new LoupeFactory())->create(
            (string)$this->getDataFolder()->create(),
            Configuration::create()
                ->withPrimaryKey(self::KEY_MOD_UUID)
                ->withSearchableAttributes(ModFilter::SEARCHABLE_ATTRIBUTES)
                ->withFilterableAttributes(ModFilter::FILTERABLE_ATTRIBUTES)
                ->withSortableAttributes(ModFilter::SORTABLE_ATTRIBUTES)
                ->withTypoTolerance(TypoTolerance::create()->withFirstCharTypoCountsDouble(false)) // can be further fine-tuned but is enabled by default
        );
    }

    public function collectDocumentData(): array
    {
        $data = array();

        foreach ($this->collection->getAll() as $mod) {
            $data[] = $this->collectMod($mod);
        }

        return $data;
    }

    /**
     * @param ModInfoInterface $mod
     * @return array<string, mixed>
     */
    private function collectMod(ModInfoInterface $mod) : array
    {
        return [
            self::KEY_MOD_UUID => $mod->getUuid(),
            self::KEY_MOD_NAME => $mod->getName(),
            self::KEY_MOD_SEARCH_TERMS => $mod->getSearchTerms(),
            self::KEY_MOD_CATEGORY => $mod->getCategory()->getLabel(),
            self::KEY_MOD_AUTHORS => $mod->getAuthors(),
            self::KEY_MOD_TAGS => $mod->getTags()
        ];
    }
}
