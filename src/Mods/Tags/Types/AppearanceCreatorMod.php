<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class AppearanceCreatorMod extends BaseTagInfo
{
    public const TAG_NAME = 'ACM';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return 'Appearance Creator Mod - Change NPC clothing in-game without any restart. Export as AMM Appearance and share your created outfit.';
    }
    
    public function getCategory(): string
    {
        return 'Mods';
    }
}
