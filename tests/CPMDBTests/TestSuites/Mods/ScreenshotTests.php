<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Mods;

use CPMDB\Mods\Mod\Screenshots\ModScreenshotCollection;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class ScreenshotTests extends CPMDBTestCase
{
    public function test_screenImageExists() : void
    {
        $collection = $this->createCollection()
            ->categoryClothing()
            ->getByID('clothing.catsuit')
            ->getScreenshotCollection();

        $this->assertTrue($collection->hasScreenshots());
        $this->assertSame(1, $collection->countScreenshots());

        $default = $collection->getDefault();
        $this->assertTrue($default->getImageFile()->exists());
    }

    public function test_multiScreenshots() : void
    {
        $collection = $this->createCollection()
            ->categoryClothing()
            ->getByID('clothing.xrx-led-leotard')
            ->getScreenshotCollection();

        $screens = $collection->getAll();

        $this->assertCount(2, $screens);
        $this->assertSame(ModScreenshotCollection::DEFAULT_ID, $screens[0]->getID());
        $this->assertTrue($screens[0]->isDefault());

        $this->assertSame('nighttime', $screens[1]->getID());
    }
}
