<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use CPMDB\Mods\Clothing\ClothingModInfo;
use CPMDB\Mods\Mod\ModInfoInterface;

class ModFilter
{
    private ModCollection $collection;

    /**
     * @var string[]
     */
    private array $tags = array();

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
    }

    public function selectTag(string $tag) : self
    {
        if(!empty($tag) && !in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    /**
     * @return ModInfoInterface[]
     */
    public function getAll() : array
    {
        $mods = $this->collection->getAll();
        if(!$this->hasFilters()) {
            return $mods;
        }

        $filtered = array();

        foreach($mods as $mod) {
            if($this->isMatch($mod)) {
                $filtered[] = $mod;
            }
        }

        return $filtered;
    }

    private function isMatch(ModInfoInterface $mod) : bool
    {
        if(!empty($this->tags))
        {
            foreach($this->tags as $tag) {
                if(!$mod->hasTag($tag)) {
                    return false;
                }
            }
        }

        return true;
    }

    public function hasFilters() : bool
    {
        return !empty($this->tags);
    }

    /**
     * @return ClothingModInfo[]
     */
    public function getClothing() : array
    {
        $result = array();

        foreach($this->getAll() as $mod) {
            if($mod instanceof ClothingModInfo) {
                $result[] = $mod;
            }
        }

        return $result;
    }
}
