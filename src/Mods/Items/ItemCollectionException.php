<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use CPMDB\Mods\Collection\ModCollectionException;

/**
 * Exception for the item collection classes.
 *
 * @package CPMDB
 * @subpackage Items
 */
class ItemCollectionException extends ModCollectionException
{
    public const ERROR_ITEM_CODE_NOT_FOUND = 165501;
}
