<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class BodyVanilla extends BaseTagInfo
{
    public const TAG_NAME = 'Body-Vanilla';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'The vanilla body for FemV and MaleV';
    }
    
    public function getCategory(): string
    {
        return 'Item properties';
    }
}
