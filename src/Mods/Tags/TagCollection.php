<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use AppUtils\ClassHelper;
use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\FileHelper;
use CPMDB\Mods\Tags\Types\CyberEngineTweaks;

class TagCollection extends BaseStringPrimaryCollection
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getDefaultID(): string
    {
        return CyberEngineTweaks::TAG_NAME;
    }

    protected function registerItems(): void
    {
        $refClass = CyberEngineTweaks::class;
        $names = FileHelper::createFileFinder(__DIR__.'/Types')->getPHPClassNames();

        foreach($names as $name) {
            $class = ClassHelper::resolveClassByReference($name, $refClass);
            $this->registerItem(ClassHelper::requireObjectInstanceOf(
                TagInfoInterface::class,
                new $class()
            ));
        }
    }
}
