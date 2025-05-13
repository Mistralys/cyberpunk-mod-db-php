<?php
/**
 * @package CPMDB
 * @subpackage Tags
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

use AppUtils\ClassHelper;
use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Tags\Types\CyberEngineTweaks;

/**
 * Collection class used to access all available tags.
 *
 * ## Usage
 *
 * 1. Get the instance of the collection: {@see self::getInstance()}.
 * 2. Get all tags: {@see self::getAll()}.
 * 3. Get a tag by its ID: {@see self::getByID()}.
 *
 * @package CPMDB
 * @subpackage Tags
 *
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
     * @param array<string> ...$tagLists
     * @return string[]
     */
    public static function mergeTags(...$tagLists) : array
    {
        $tags = array();

        foreach($tagLists as $tagList) {
            array_push($tags, ...self::filterTags($tagList));
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

    /**
     * Returns a list of all tags, grouped by their category.
     *
     * @return array<string, TagInfoInterface[]>
     */
    public function getCategorized() : array
    {
        $categories = array();
        foreach($this->getAll() as $tag) {
            $category = $tag->getCategory();
            if(!isset($categories[$category])) {
                $categories[$category] = array();
            }

            $categories[$category][] = $tag;
        }

        uksort($categories, 'strnatcasecmp');

        return $categories;
    }
}
