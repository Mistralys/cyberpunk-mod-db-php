<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Indexer;

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\ModCollection;
use Loupe\Loupe\Config\TypoTolerance;
use Loupe\Loupe\Configuration;
use Loupe\Loupe\Loupe;
use Loupe\Loupe\LoupeFactory;

class IndexManager
{
    private ?Loupe $index = null;
    private ModCollection $collection;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
    }

    public function getCollection(): ModCollection
    {
        return $this->collection;
    }

    public function indexExists() : bool
    {
        return $this->getDataDir()->exists();
    }

    public function clearIndex() : void
    {
        $this->getDataDir()->delete();
    }

    public function buildIndex() : void
    {
        $this->createIndexBuilder()->buildIndex();
    }

    public function createIndexBuilder() : IndexBuilder
    {
        return new IndexBuilder($this);
    }

    public function getDataDir() : FolderInfo
    {
        return FolderInfo::factory($this->collection->getCacheFolder().'/index');
    }

    public function getIndex() : Loupe
    {
        if(isset($this->index)) {
            return $this->index;
        }

        $dataDir = $this->getDataDir()->create();

        $this->index = (new LoupeFactory())->create(
            (string)$dataDir,
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
