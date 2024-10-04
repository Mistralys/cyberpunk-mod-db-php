<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Items;

use CPMDB\Mods\Tags\Types\Jewelry;
use CPMDB\Mods\Tags\Types\Physics;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class CollectionTests extends CPMDBTestCase
{
    public function test_getItemByUUID() : void
    {
        $collection = $this->createCollection()->getItemCollection();

        $this->assertTrue($collection->idExists('clothing.evelyn-skirt.peachu_evelyn_pink'));
    }

    public function test_getItemByItemCode() : void
    {
        $collection = $this->createCollection()->getItemCollection();

        $this->assertTrue($collection->itemCodeExists('peachu_evelyn_pink'));

        $dress = $collection->getByItemCode('peachu_evelyn_pink');

        $this->assertSame('Pink', $dress->getName());
    }

    public function test_multi() : void
    {
        $collection = $this->createCollection();

        $items = $collection->createItemFilter()
            ->selectSearchTerm('earrings')
            ->selectTag(Jewelry::TAG_NAME)
            ->selectTag(Physics::TAG_NAME)
            ->getItemsAsCollection();

        $this->assertNotEmpty($items);
        $this->assertTrue($items->itemCodeExists('earrings_08_basic_04_kwek'));
    }
}
