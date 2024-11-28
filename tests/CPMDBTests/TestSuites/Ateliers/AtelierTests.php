<?php

declare(strict_types=1);

namespace CPMDBTests\TestSuites\Ateliers;

use CPMDB\Mods\Ateliers\Atelier\CubAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\NcFashionAtelier;
use CPMDB\Mods\Ateliers\AtelierNames;
use CPMDB\Mods\Clothing\ClothingModInfo;
use CPMDBTEsts\TestClasses\CPMDBTestCase;

final class AtelierTests extends CPMDBTestCase
{
    public function test_getByID() : void
    {
        $atelier = $this->createAteliers()->getByID(NcFashionAtelier::ATELIER_ID);

        $this->assertSame('nc-fashion', $atelier->getID());
    }

    public function test_getByURL() : void
    {
        $atelier = $this->createAteliers()->getByURL(NcFashionAtelier::ATELIER_URL);

        $this->assertNotNull($atelier);
        $this->assertSame('nc-fashion', $atelier->getID());
    }

    public function test_getByEnumID() : void
    {
        $atelier = $this->createAteliers()->getByID(AtelierNames::NC_FASHION);

        $this->assertSame('nc-fashion', $atelier->getID());
    }

    public function test_getMods() : void
    {
        $mods = $this
            ->createAteliers()
            ->getByID(AtelierNames::CUB_ATELIER_STORE)
            ->getMods();

        $this->assertCount(count(CubAtelierStore::MOD_IDS), $mods);
    }

    public function test_getAtelier() : void
    {
        $mod = $this->createCollection()->getByID('clothing.cute-zipper-top');

        $this->assertInstanceOf(ClothingModInfo::class, $mod);

        $atelier = $mod->getAtelier();
        $this->assertNotNull($atelier);
        $this->assertSame(CubAtelierStore::ATELIER_ID, $atelier->getID());
    }
}