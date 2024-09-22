<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use AppUtils\Interfaces\StringPrimaryRecordInterface;

interface TagInfoInterface extends StringPrimaryRecordInterface
{
    public function getLabel() : string;

    public function getCategory() : string;
}
