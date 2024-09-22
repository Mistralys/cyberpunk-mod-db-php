<?php
/**
 * @package CPMDB
 * @subackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\DataLoader;

use CPMDB\Mods\Collection\BaseCategory;

/**
 * Interface for mod collection data loaders.
 *
 * @package CPMDB
 * @subackage Mod Collection
 */
interface DataLoaderInterface
{
    /**
     * Registers all mods available in the given category.
     * @param BaseCategory $category
     * @return void
     */
    public function registerCategoryMods(BaseCategory $category) : void;

    /**
     * Gets all mod IDs available in the given category.
     * @param BaseCategory $category
     * @return string[]
     */
    public function getIDsByCategory(BaseCategory $category) : array;

    /**
     * Fetches a mod's entire data set.
     * @param BaseCategory $category
     * @param string $modID
     * @return array<string,mixed>
     */
    public function loadModData(BaseCategory $category, string $modID) : array;
}
