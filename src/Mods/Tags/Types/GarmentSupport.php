<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class GarmentSupport extends BaseTagInfo
{
    public const TAG_NAME = 'GarmentSupport';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Clothing system that handles tucking pants into boots and shirts under jackets.';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
