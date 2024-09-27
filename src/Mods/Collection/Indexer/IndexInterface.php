<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Indexer;

use AppUtils\FileHelper\FolderInfo;
use Loupe\Loupe\Loupe;

interface IndexInterface
{
    public function getID() : string;
    public function isValid() : bool;
    public function build() : void;
    public function getDataFolder(): FolderInfo;
    public function clearIndex() : void;
    public function getPrimaryKeyName() : string;
    public function getSearchInstance() : Loupe;

    /**
     * @return array<int,array<string,mixed>>
     */
    public function collectDocumentData() : array;
}
