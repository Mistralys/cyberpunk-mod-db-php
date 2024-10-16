<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod\SeeAlso;

use CPMDB\Mods\Mod\ModInfoInterface;

interface SeeAlsoReferenceInterface
{
    public function getSourceMod(): ModInfoInterface;
}
