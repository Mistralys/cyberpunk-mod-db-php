<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod\Screenshots;

use AppUtils\FileHelper\FileInfo;
use AppUtils\Interfaces\StringPrimaryRecordInterface;

interface ModScreenshotInterface extends StringPrimaryRecordInterface
{
    public function isDefault() : bool;
    public function getURL() : string;
    public function getImageFile() : FileInfo;
    public function getTitle() : string;
}
