<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Items;

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
}
