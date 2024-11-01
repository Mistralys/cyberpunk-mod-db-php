<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class DoItYourself extends BaseTagInfo
{
    public const TAG_NAME = 'DIY';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Do-It-Yourself - Clothing items that can be customized with Wolvenkit';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
