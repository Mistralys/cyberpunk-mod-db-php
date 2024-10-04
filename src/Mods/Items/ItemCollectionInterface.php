<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\Interfaces\StringPrimaryCollectionInterface;

/**
 * Interface for all mod item collections.
 *
 * @package CPMDB
 * @subpackage Items
 *
 * @method ItemInfoInterface[] getAll()
 * @method ItemInfoInterface getDefault()
 * @method ItemInfoInterface getByID(string $id)
 */
interface ItemCollectionInterface extends StringPrimaryCollectionInterface
{
    /**
     * @return string[]
     */
    public function getItemCodes() : array;
    public function itemCodeExists(string $itemCode) : bool;
    public function getByItemCode(string $itemCode) : ItemInfoInterface;

    /**
     * Goes through all items and categories, and returns their tags
     * in one unique list.
     *
     * NOTE: Use sparingly, as this is not cached.
     *
     * @return string[]
     */
    public function collectTags() : array;

    /**
     * Gets the items categorized by category.
     * @return ItemCategory[]
     */
    public function getCategories() : array;
}
