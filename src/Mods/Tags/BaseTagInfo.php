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

    /**
     * @return string[]
     */
    public function getRelatedTagIDs() : array
    {
        return static::RELATED_TAGS;
    }

    public function hasRelatedTags() : bool
    {
        return !empty(static::RELATED_TAGS);
    }

    /**
     * @var TagInfoInterface[]|null
     */
    private ?array $relatedTags = null;

    /**
     * Gets all tags related to this tag, if any.
     * @return TagInfoInterface[]
     */
    public function getRelatedTags() : array
    {
        if(isset($this->relatedTags)) {
            return $this->relatedTags;
        }

        $tags = array();
        $collection = TagCollection::getInstance();

        foreach($this->getRelatedTagIDs() as $tagID) {
            $tags[] = $collection->getByID($tagID);
        }

        $this->relatedTags = $tags;

        return $tags;
    }

    /**
     * @return TagLink[]
     */
    abstract protected function _getLinks() : array;

    /**
     * @var TagLink[]|null
     */
    private ?array $links = null;

    /**
     * @return TagLink[]
     */
    public function getLinks() : array
    {
        if(!isset($this->links)) {
            $this->links = $this->_getLinks();
        }

        return $this->links;
    }
}
