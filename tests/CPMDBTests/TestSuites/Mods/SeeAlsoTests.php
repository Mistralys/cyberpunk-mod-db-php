<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Mods;

use CPMDBTEsts\TestClasses\CPMDBTestCase;
use CPMDBTests\TestClasses\ModAssertionsInterface;
use CPMDBTests\TestClasses\ModAssertionsTrait;

final class SeeAlsoTests extends CPMDBTestCase implements ModAssertionsInterface
{
    use ModAssertionsTrait;

    public function test_getLinkedMods() : void
    {
        $mod = $this->getTestMod('clothing.casual-style-outfit-part-2');

        $this->assertModIsLinkedWith($mod, 'clothing.casual-style-outfit-part-4');
        $this->assertModIsLinkedWith($mod, 'clothing.casual-style-outfit-part-8');
    }

    public function test_hasSeeAlso() : void
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }

    public function test_getSeeAlso() : void
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
