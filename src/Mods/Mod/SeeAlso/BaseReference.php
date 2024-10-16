<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod\SeeAlso;

use CPMDB\Mods\Mod\ModInfoInterface;

abstract class BaseReference implements SeeAlsoReferenceInterface
{
    private ModInfoInterface $sourceMod;

    public function __construct(ModInfoInterface $sourceMod)
    {
        $this->sourceMod = $sourceMod;
    }

    public function getSourceMod(): ModInfoInterface
    {
        return $this->sourceMod;
    }
}
