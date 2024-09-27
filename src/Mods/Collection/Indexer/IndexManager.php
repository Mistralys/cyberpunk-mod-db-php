<?php
/**
 * @package CPMDB
 * @subpackage Search Index
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Indexer;

use AppUtils\FileHelper;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\ModCollection;
use Loupe\Loupe\Config\TypoTolerance;
use Loupe\Loupe\Configuration;
use Loupe\Loupe\Loupe;
use Loupe\Loupe\LoupeFactory;

/**
 * Manages the search index for mods: Checks if the
 * database exists and is up-to-date, and creates it
 * as necessary.
 *
 * ## Usage
 *
 * Everything is automated. Once instantiated, simply
 * call {@see self::getIndex()} to start working with
 * the {@see Loupe} search engine instance.
 *
 * @package CPMDB
 * @subpackage Search Index
 */
class IndexManager
{
    public const INDEX_SYSTEM_VERSION = '1';

    private ?Loupe $index = null;
    private ModCollection $collection;
    private FileInfo $versionFile;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
        $this->versionFile = FileInfo::factory($this->getDataDir().'/index.version');
    }

    public function getCollection(): ModCollection
    {
        return $this->collection;
    }

    public function isIndexValid() : bool
    {
        return
            $this->versionFile->exists()
            &&
            $this->versionFile->getContents() === $this->getIndexVersion();
    }

    public function clearIndex() : void
    {
        FileHelper::deleteTree($this->getDataDir());
    }

    public function getIndex() : Loupe
    {
        if($this->isIndexValid()) {
            return $this->createIndexInstance();
        }

        $this->clearIndex();

        $this->createIndexBuilder()->buildIndex();
        $this->versionFile->putContents($this->getIndexVersion());

        return $this->createIndexInstance();
    }

    public function getIndexVersion() : string
    {
        return 'DB:v'.$this->collection->getDBVersion().';Index:v'.self::INDEX_SYSTEM_VERSION;
    }

    public function createIndexBuilder() : IndexBuilder
    {
        return new IndexBuilder($this);
    }

    public function getDataDir() : FolderInfo
    {
        return FolderInfo::factory($this->collection->getCacheFolder().'/index');
    }

    public function createIndexInstance() : Loupe
    {
        if(isset($this->index)) {
            return $this->index;
        }

        $this->index = (new LoupeFactory())->create(
            (string)$this->getDataDir()->create(),
            Configuration::create()
                ->withPrimaryKey(IndexBuilder::KEY_UUID)
                ->withSearchableAttributes(array(IndexBuilder::KEY_NAME, IndexBuilder::KEY_CATEGORY, IndexBuilder::KEY_AUTHORS))
                ->withFilterableAttributes(array(IndexBuilder::KEY_AUTHORS, IndexBuilder::KEY_TAGS))
                ->withSortableAttributes(array(IndexBuilder::KEY_NAME, IndexBuilder::KEY_CATEGORY))
                ->withTypoTolerance(TypoTolerance::create()->withFirstCharTypoCountsDouble(false)) // can be further fine-tuned but is enabled by default
        );

        return $this->index;
    }
}
