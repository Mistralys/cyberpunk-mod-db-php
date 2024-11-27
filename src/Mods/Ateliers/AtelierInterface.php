<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers;

use AppUtils\Interfaces\StringPrimaryRecordInterface;
use CPMD\Mods\Ateliers\AtelierCollection;
use CPMD\Mods\Ateliers\BaseAtelier;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Interface for atelier mods. A base implementation is provided
 * in the {@see BaseAtelier} class.
 *
 * @package CPMDB
 * @subpackage Ateliers
 */
interface AtelierInterface extends StringPrimaryRecordInterface
{
    public const MOD_IDS = array();

    /**
     * Human-readable name of the atelier.
     * @return string
     */
    public function getName() : string;

    /**
     * URL to the atelier mod homepage.
     * @return string
     */
    public function getURL() : string;

    /**
     * A list of atelier author names.
     * @return string[]
     */
    public function getAuthors() : array;

    /**
     * A list of mods associated with this atelier.
     * @return ModInfoInterface[]
     */
    public function getMods() : array;

    /**
     * Gets all mods associated with this atelier,
     * as a collection for more flexible ways to
     * access the mods.
     *
     * @return AtelierMods
     */
    public function getModsCollection() : AtelierMods;

    public function getAtelierCollection() : AtelierCollection;
}
