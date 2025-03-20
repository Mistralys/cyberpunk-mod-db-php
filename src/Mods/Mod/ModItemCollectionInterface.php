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
     * Gets a category in the mod by its ID.
     *
     * > NOTE: Will throw an exception if the category
     * > does not exist. Use {@see self::categoryExists()}
     * > to check if a category exists.
     *
     * @param string $id
     * @return ItemCategory
     */
    public function getCategoryByID(string $id) : ItemCategory;

    /**
     * Checks if a category exists in the mod.
     *
     * @param string $id
     * @return bool
     */
    public function categoryExists(string $id) : bool;

    /**
     * Gets the IDs of all categories in the mod.
     * @return string[]
     */
    public function getCategoryIDs() : array;
}
