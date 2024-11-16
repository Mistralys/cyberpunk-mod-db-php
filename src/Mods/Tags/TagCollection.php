<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use AppUtils\ClassHelper;
use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\FileHelper;
use AppUtils\FileHelper\FolderInfo;
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

    /**
     * @param array<mixed> $tags
     * @return string[]
     */
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
     * @param array<string[]> ...$tagLists
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
        $classes = ClassHelper::findClassesInFolder(
            FolderInfo::factory(__DIR__.'/Types'),
            true,
            TagInfoInterface::class
        );

        foreach($classes as $class) {
            $className = $class->getNameNS();
            $this->registerItem(ClassHelper::requireObjectInstanceOf(
                TagInfoInterface::class,
                new $className()
            ));
        }
    }
}
