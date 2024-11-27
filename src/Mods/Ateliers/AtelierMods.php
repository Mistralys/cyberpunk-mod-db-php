<?php

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers;

use CPMDB\Mods\Collection\BaseModCollection;

class AtelierMods extends BaseModCollection
{
    private AtelierInterface $atelier;

    public function __construct(AtelierInterface $atelier)
    {
        $this->atelier = $atelier;
    }

    protected function resolveMods(): array
    {
        return $this->atelier->getMods();
    }
}
