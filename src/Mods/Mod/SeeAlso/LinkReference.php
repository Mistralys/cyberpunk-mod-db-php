<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod\SeeAlso;

use AppUtils\AttributeCollection;
use CPMDB\Mods\Mod\ModInfoInterface;
use function AppUtils\sb;

class LinkReference extends BaseReference
{
    private string $url;
    private ?string $label;

    public function __construct(ModInfoInterface $sourceMod, string $url, ?string $label)
    {
        parent::__construct($sourceMod);

        $this->url = $url;
        $this->label = $label;
    }

    public function getURL(): string
    {
        return $this->url;
    }

    public function getLabel(): string
    {
        if(!empty($this->label)) {
            return $this->label;
        }

        return $this->url;
    }

    /**
     * Renders the HTML tag to display the link.
     *
     * @param bool $newTab Whether to open the link in a new tab.
     * @param AttributeCollection|null $attributes Additional attributes to add to the link.
     * @return string
     */
    public function renderLinkTag(bool $newTab=true, ?AttributeCollection $attributes=null) : string
    {
        return (string)sb()->link(
            $this->url,
            (string)$this->label,
            $newTab,
            $attributes
        );
    }
}
