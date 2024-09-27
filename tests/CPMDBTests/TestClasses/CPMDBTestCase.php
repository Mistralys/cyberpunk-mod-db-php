<?php

declare(strict_types=1);

namespace CPMDBTEsts\TestClasses;

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;
use CPMDB\Mods\Collection\ModCollection;
use PHPUnit\Framework\TestCase;

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
        return ModCollection::create(
            $this->getVendorFolder(),
            $this->getCacheFolder(),
            'http://127.0.0.1/cpmdb'
        );
    }

    protected function setUp(): void
    {
        CacheDataWriter::clearCache($this->getCacheFolder());
        CacheDataWriter::setCacheEnabled(false);
    }
}
