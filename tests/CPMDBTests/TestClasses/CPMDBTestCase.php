<?php

declare(strict_types=1);

namespace CPMDBTEsts\TestClasses;

use AppUtils\FileHelper\FolderInfo;
use CPMD\Mods\Ateliers\AtelierCollection;
use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Mod\ModInfoInterface;
use PHPUnit\Framework\TestCase;
use function CPMDB\Mods\Tools\createTestCollection;

class CPMDBTestCase extends TestCase
{
    protected function getVendorFolder() : FolderInfo
    {
        return FolderInfo::factory(__DIR__.'/../../../vendor');
    }

    protected function getCacheFolder() : FolderInfo
    {
        return FolderInfo::factory(__DIR__.'/../../cache');
    }

    protected function createCollection() : ModCollection
    {
        return createTestCollection(false);
    }

    protected function createAteliers() : AtelierCollection
    {
        return $this->createCollection()->createAteliers();
    }

    protected function getTestMod(string $modID) : ModInfoInterface
    {
        $collection = $this->createCollection();

        if($collection->idExists($modID)) {
            return $collection->getByID($modID);
        }

        $this->fail(sprintf(
            'The mod [%s] does not exist in the collection. '.PHP_EOL.
            'The database contains the following mods: '.PHP_EOL.
            '- %s',
            $modID,
            implode(PHP_EOL.'- ', $collection->getIDs())
        ));
    }

    protected function setUp(): void
    {
        CacheDataWriter::clearCache($this->getCacheFolder());
        CacheDataWriter::setCacheEnabled(false);
    }
}
