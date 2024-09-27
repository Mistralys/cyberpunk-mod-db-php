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

    /**
     * Do the items have categories assigned to them?
     * @return bool
     */
    public function hasCategories() : bool;

    /**
     * Gets the items categorized by category, if any.
     *
     * If the items are not categorized in the data,
     * a category called "Uncategorized" will be used
     * instead.
     *
     * @return ItemCategory[]
     */
    public function getCategorized() : array;
}
