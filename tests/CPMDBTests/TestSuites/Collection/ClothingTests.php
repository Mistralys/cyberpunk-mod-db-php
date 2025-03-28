<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Collection;

use CPMDB\Mods\Mod\ModID;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class ClothingTests extends CPMDBTestCase
{
    public function test_exists() : void
    {
        $collection = $this->createCollection()->categoryClothing();
        $testID = 'clothing.catsuit';

        $this->assertTrue($collection->idExists($testID));

        $mod = $collection->getByID($testID);

        $this->assertSame($testID, $mod->getID());
        $this->assertStringContainsString('nexusmods.com', $mod->getAtelierURL());
        $this->assertTrue($mod->hasAtelier());
    }

    /**
     * The test ID does not have the mod category,
     * but thanks to {@see ModID}, it is still possible
     * to retrieve the mod.
     */
    public function test_modIDexists() : void
    {
        $collection = $this->createCollection();
        $testID = 'catsuit';

        $this->assertTrue($collection->idExists($testID));

        $mod = $collection->getByID($testID);

        $this->assertSame($testID, $mod->getModID());
    }
}
