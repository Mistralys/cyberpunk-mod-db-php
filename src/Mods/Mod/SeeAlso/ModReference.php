<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod\SeeAlso;

use CPMDB\Mods\Mod\ModInfoInterface;

class ModReference extends BaseReference
{
    private string $targetModID;

    public function __construct(ModInfoInterface $sourceMod, string $targetModID)
    {
        parent::__construct($sourceMod);

        $this->targetModID = $targetModID;
    }

    public function getTargetModID(): string
    {
        return $this->targetModID;
    }

    public function getTargetMod() : ModInfoInterface
    {
        return $this->getSourceMod()->getModCollection()->getByID($this->getTargetModID());
    }
}
