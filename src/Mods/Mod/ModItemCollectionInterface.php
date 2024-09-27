<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use CPMDB\Mods\Items\ItemCollectionInterface;

interface ModItemCollectionInterface extends ItemCollectionInterface
{
    public function getMod() : ModInfoInterface;
}
