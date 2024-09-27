<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\Interfaces\StringPrimaryRecordInterface;

interface ItemInfoInterface extends StringPrimaryRecordInterface
{
    public function getUUID() : string;
    public function getName() : string;
    public function getNameWithCategory() : string;
    public function getCategory() : string;
    public function getItemCode() : string;
    public function getMod(): ModInfoInterface;
    public function getModID() : string;
}
