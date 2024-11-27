<?php
/**
 * @package CPMDB
 * @subpackage Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection;

use AppUtils\Interfaces\StringPrimaryCollectionInterface;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Interface for mod collections. A base implementation is
 * provided by {@see BaseModCollection}.
 *
 * @package CPMDB
 * @subpackage Collection
 *
 * @method ModInfoInterface[] getAll()
 * @method ModInfoInterface getDefault()
 * @method ModInfoInterface getByID(string $id)
 */
interface ModCollectionInterface extends StringPrimaryCollectionInterface
{
}
