<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use AppUtils\ClassHelper;
use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\FileHelper;
use CPMDB\Mods\Tags\Types\CyberEngineTweaks;

/**
 * @method TagInfoInterface[] getAll()
 * @method TagInfoInterface getByID(string $id)
 * @method TagInfoInterface getDefault()
 */
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

    public static function filterTags(array $tags) : array
    {
        $result = array();

        foreach($tags as $tag) {
            if(is_string($tag)) {
                $result[] = $tag;
            }
        }

        return $result;
    }

    /**
     * Merges multiple tag lists into one unique list.
     *
     * @param string[] ...$tagLists
     * @return string[]
     */
    public static function mergeTags(...$tagLists) : array
    {
        $tags = array();

        foreach($tagLists as $tagList) {
            if(is_array($tagList)) {
                array_push($tags, ...self::filterTags($tagList));
            }
        }

        $result = array_unique($tags);

        sort($result);

        return $result;
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
