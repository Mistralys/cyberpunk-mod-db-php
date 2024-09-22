<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Tags;

use AppUtils\FileHelper;
use CPMDB\Mods\Tags\TagCollection;
use CPMDB\Mods\Tags\Types\CyberEngineTweaks;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class TagTests extends CPMDBTestCase
{
    public function test_getByID() : void
    {
        $collection = TagCollection::getInstance();

        $tag = $collection->getByID(CyberEngineTweaks::TAG_NAME);

        $this->assertInstanceOf(CyberEngineTweaks::class, $tag);
    }

    public function test_amountTags() : void
    {
        $collection = TagCollection::getInstance();

        $amountFiles = count(
            FileHelper::createFileFinder(__DIR__.'/../../../../src/Mods/Tags/Types')
                ->getPHPFiles()
        );

        $this->assertSame($amountFiles, $collection->countRecords());
    }
}
