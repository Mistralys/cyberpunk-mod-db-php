<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use CPMDB\Mods\Items\ItemCategory;
use CPMDB\Mods\Items\ItemCollectionInterface;

interface ModItemCollectionInterface extends ItemCollectionInterface
{
    public function getMod() : ModInfoInterface;

    /**
     * Gets the CET commands for all items in the mod.
     * @return string
     */
    public function getCETCommands() : string;
}
