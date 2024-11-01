<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class MaleV extends BaseTagInfo
{
    public const TAG_NAME = 'MaleV';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Items restricted to male V characters';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
