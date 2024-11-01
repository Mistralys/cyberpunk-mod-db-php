<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class VirtualAtelier extends BaseTagInfo
{
    public const TAG_NAME = 'VAT';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Virtual Atelier - Adds clothing stores to the in-game browser.';
    }
    
    public function getCategory(): string
    {
        return 'Mods';
    }
}
