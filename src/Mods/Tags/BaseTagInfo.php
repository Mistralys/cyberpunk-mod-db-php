<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

abstract class BaseTagInfo implements TagInfoInterface
{
    private string $name;

    public function __construct()
    {
        $this->name = $this->_getName();
    }

    public function getID(): string
    {
        return $this->name;
    }

    abstract protected function _getName() : string;
}
