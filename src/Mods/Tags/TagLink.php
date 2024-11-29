<?php
/**
 * @package CPMDB
 * @subpackage Tags
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

/**
 * Holds information on a single web link related to a tag.
 *
 * @package CPMDB
 * @subpackage Tags
 */
class TagLink
{
    private TagInfoInterface $tag;
    private string $url;
    private string $label;

    public function __construct(TagInfoInterface $tag, string $url, string $label)
    {
        $this->tag = $tag;
        $this->url = $url;
        $this->label = $label;
    }

    public function getTag() : TagInfoInterface
    {
        return $this->tag;
    }

    public function getURL() : string
    {
        return $this->url;
    }

    public function getLabel() : string
    {
        return $this->label;
    }
}
