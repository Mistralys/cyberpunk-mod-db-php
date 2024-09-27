<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\Interfaces\StringPrimaryCollectionInterface;

interface ItemCollectionInterface extends StringPrimaryCollectionInterface
{
    public function getMod() : ModInfoInterface;

    /**
     * @return string[]
     */
    public function getItemCodes() : array;
    public function itemCodeExists(string $itemCode) : bool;
}
