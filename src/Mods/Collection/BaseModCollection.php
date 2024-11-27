<?php
/**
 * @package CPMDB
 * @subpackage Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use AppUtils\Collections\BaseStringPrimaryCollection;
use CPMDB\Mods\Ateliers\AtelierMods;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Base class for mod collections. Used to create custom
 * mod collections, like {@see AtelierMods}.
 *
 * @package CPMDB
 * @subpackage Collection
 * @see ModCollectionInterface
 */
abstract class BaseModCollection extends BaseStringPrimaryCollection implements ModCollectionInterface
{
    private string $defaultID;

    /**
     * @return ModInfoInterface[]
     */
    abstract protected function resolveMods() : array;

    protected function registerItems(): void
    {
        foreach($this->resolveMods() as $mod) {
            $this->registerItem($mod);
        }

        if(!empty($this->items)) {
            $this->defaultID = $this->items[array_key_first($this->items)]->getID();
        }
    }

    public function getDefaultID(): string
    {
        return $this->defaultID;
    }
}
