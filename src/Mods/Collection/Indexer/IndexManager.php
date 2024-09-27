<?php
/**
 * @package CPMDB
 * @subpackage Search Index
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Indexer;

use CPMDB\Mods\Collection\ModCollection;

/**
 * Manages the search index for mods: Checks if the
 * database exists and is up-to-date, and creates it
 * as necessary.
 *
 * ## Usage
 *
 * Everything is automated. Once instantiated, simply
 * call {@see self::getModIndex()} or {@see self::getItemIndex()}
 * to start working with the available indexes.
 *
 * @package CPMDB
 * @subpackage Search Index
 */
class IndexManager
{
    public const INDEX_SYSTEM_VERSION = '3';

    private ModIndex $modIndex;
    private ItemIndex $itemIndex;
    private ModCollection $collection;

    /**
     * @var BaseIndex[]
     */
    private array $indexes;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;

        $this->modIndex = new ModIndex($this);
        $this->itemIndex = new ItemIndex($this);

        $this->indexes = array(
            $this->modIndex,
            $this->itemIndex
        );
    }

    public function getCollection(): ModCollection
    {
        return $this->collection;
    }

    public function isIndexValid() : bool
    {
        foreach($this->indexes as $index) {
            if(!$index->isValid()) {
                return false;
            }
        }

        return true;
    }

    public function clearIndex() : void
    {
        foreach($this->indexes as $index) {
            $index->clearIndex();
        }
    }

    public function getModIndex() : ModIndex
    {
        $this->modIndex->build();

        return $this->modIndex;
    }

    public function getItemIndex() : ItemIndex
    {
        $this->itemIndex->build();

        return $this->itemIndex;
    }

    public function getIndexVersion() : string
    {
        return 'DB:v'.$this->collection->getDBVersion().';Index:v'.self::INDEX_SYSTEM_VERSION;
    }
}
