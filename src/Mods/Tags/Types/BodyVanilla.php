<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\BodyModTagInfo;

class BodyVanilla extends BodyModTagInfo
{
    public const TAG_NAME = 'Body-Vanilla';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Standard game body';
    }

    public function getSourceURL(): string
    {
        return 'https://cybperpunk.net';
    }
}
