<?php

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\Interfaces\StringPrimaryCollectionInterface;

/**
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
}
