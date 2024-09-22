<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Categories;

abstract class BodyModTagInfo extends ModTagInfo
{
    public function getCategory(): string
    {
        return 'Body mod';
    }
}
