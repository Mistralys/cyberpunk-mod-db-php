<?php

declare(strict_types=1);

namespace CPMDBTEsts\TestClasses;

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\ModCollection;
use PHPUnit\Framework\TestCase;

class CPMDBTestCase extends TestCase
{
    protected function getVendorFolder() : FolderInfo
    {
        return FolderInfo::factory(__DIR__.'/../../../vendor');
    }

    protected function createCollection() : ModCollection
    {
        return ModCollection::create(
            $this->getVendorFolder(),
            'http://127.0.0.1/cpmdb'
        );
    }
}
