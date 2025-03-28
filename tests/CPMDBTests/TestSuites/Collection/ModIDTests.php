<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Collection;

use CPMDB\Mods\Mod\ModID;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class ModIDTests extends CPMDBTestCase
{
    public function test_list2UUIDStrings(): void
    {
        $ids = array(
            'clothing.catsuit',
            'catsuit',
            'clothing.biker-boots',
            ModID::create('biker-boots')
        );

        $this->assertSame(
            array(
                'clothing.biker-boots',
                'clothing.catsuit'
            ),
            ModID::list2UUIDStrings($ids)
        );
    }

    public function test_list2UUIDs() : void
    {
        $ids = array(
            'clothing.catsuit',
            'catsuit',
            'clothing.biker-boots',
            ModID::create('biker-boots')
        );

        $result = ModID::list2UUIDs($ids);

        $this->assertCount(2, $result);
        $this->assertSame('clothing.biker-boots', $result[0]->getModUUID());
        $this->assertSame('clothing.catsuit', $result[1]->getModUUID());
    }
}
