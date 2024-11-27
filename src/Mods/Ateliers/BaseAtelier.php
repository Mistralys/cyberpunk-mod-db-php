<?php
/**
 * @package CPMDB
 * @supackage Ateliers
 */

declare(strict_types=1);

namespace CPMD\Mods\Ateliers;

use CPMDB\Mods\Ateliers\AtelierInterface;
use CPMDB\Mods\Ateliers\AtelierMods;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Abstract base class for atelier mods.
 *
 * @package CPMDB
 * @supackage Ateliers
 * @see AtelierInterface
 */
abstract class BaseAtelier implements AtelierInterface
{
    private AtelierCollection $collection;

    public function __construct(AtelierCollection $collection)
    {
        $this->collection = $collection;
    }

    public function getAtelierCollection() : AtelierCollection
    {
        return $this->collection;
    }

    /**
     * @var ModInfoInterface[]|null
     */
    private ?array $mods = null;

    public function getMods() : array
    {
        if(isset($this->mods)) {
            return $this->mods;
        }

        $mods = array();
        foreach(static::MOD_IDS as $modID) {
            $mods[] = $this->collection->getModCollection()->getByID($modID);
        }

        $this->mods = $mods;

        return $mods;
    }

    private ?AtelierMods $modsCollection = null;

    public function getModsCollection() : AtelierMods
    {
        if(!isset($this->modsCollection)) {
            $this->modsCollection = new AtelierMods($this);
        }

        return $this->modsCollection;
    }
}
