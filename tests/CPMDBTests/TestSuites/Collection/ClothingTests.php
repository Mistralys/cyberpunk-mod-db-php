<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Collection;

use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class ClothingTests extends CPMDBTestCase
{
    public function test_exists() : void
    {
        $collection = $this->createCollection()->categoryClothing();
        $testID = 'clothing-catsuit';

        $this->assertTrue($collection->idExists($testID));

        $mod = $collection->getByID($testID);

        $this->assertSame($testID, $mod->getID());
        $this->assertTrue($mod->hasAtelier());
        $this->assertStringContainsString('nexusmods.com', $mod->getAtelierURL());
    }
}
