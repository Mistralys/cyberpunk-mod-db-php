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
use Loupe\Loupe\Loupe;

/**
 * Base class for search indexes collecting document
 * data to store in {@see Loupe} databases for searching.
 *
 * @package CPMDB
 * @subpackage Search Index
 */
abstract class BaseIndex implements IndexInterface
{
    protected ModCollection $collection;
    private FileInfo $versionFile;
    private FolderInfo $dataFolder;
    private IndexManager $manager;
    private ?Loupe $searchInstance = null;

    public function __construct(IndexManager $manager)
    {
        $this->manager = $manager;
        $this->collection = $manager->getCollection();
        $this->dataFolder = FolderInfo::factory($this->collection->getCacheFolder().'/'.$this->getID().'-index');
        $this->versionFile = FileInfo::factory($this->dataFolder.'/index.version');
    }

    public function isValid() : bool
    {
        return
            $this->versionFile->exists()
            &&
            $this->versionFile->getContents() === $this->manager->getIndexVersion();
    }

    public function build() : void
    {
        if($this->isValid()) {
            return;
        }

        $this->clearIndex();

        $this->getSearchInstance()->addDocuments($this->collectDocumentData());

        $this->versionFile->putContents($this->manager->getIndexVersion());
    }

    public function getDataFolder(): FolderInfo
    {
        return $this->dataFolder;
    }

    public function clearIndex() : void
    {
        FileHelper::deleteTree($this->getDataFolder());
    }

    public function getSearchInstance() : Loupe
    {
        if(!isset($this->searchInstance)) {
            $this->searchInstance = $this->createSearchInstance();
        }

        return $this->searchInstance;
    }

    abstract protected function createSearchInstance() : Loupe;
}
