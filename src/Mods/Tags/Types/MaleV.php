<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\BodyTypeTagInfo;

class MaleV extends BodyTypeTagInfo
{
    public const TAG_NAME = 'MaleV';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Male V';
    }
}
