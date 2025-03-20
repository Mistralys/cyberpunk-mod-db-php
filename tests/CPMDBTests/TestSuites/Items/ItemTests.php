<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Items;

use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class ItemTests extends CPMDBTestCase
{
    public function test_getCategory() : void
    {
        $collection = $this->getTestMod('clothing.alts-choker')->getItemCollection();

        $this->assertTrue($collection->categoryExists('chokers'));
        $this->assertSame('chokers', $collection->getCategoryByID('chokers')->getID());
    }

    public function test_getCategoryIcon() : void
    {
        $category = $this
            ->getTestMod('clothing.alts-choker')
            ->getItemCollection()
            ->getCategoryByID('chokers');

        $this->assertSame('choker', $category->getIconName());
        $this->assertTrue($category->hasIcon());
        $this->assertNotNull($category->getIconFile());
        $this->assertNotEmpty($category->getIconURL());
    }
}
