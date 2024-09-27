<?php

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\Interfaces\StringPrimaryRecordInterface;
use CPMDB\Mods\Mod\ModInfoInterface;

interface ItemInfoInterface extends StringPrimaryRecordInterface
{
    public function getUUID() : string;
    public function getName() : string;
    public function getNameWithCategory() : string;
    public function getCategory() : string;
    public function getItemCode() : string;
    public function getMod(): ModInfoInterface;
    public function getModID() : string;

    /**
     * All authors associated with the item.
     *
     * NOTE: This is inherited from the mod.
     *
     * @return string[]
     */
    public function getAuthors() : array;

    /**
     * All tags associated with the item.
     *
     * NOTE: This is inherited from the mod.
     *
     * @return string[]
     */
    public function getTags() : array;
}
