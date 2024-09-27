<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\Interfaces\StringPrimaryRecordInterface;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Interface for all items added by mods.
 *
 * @package CPMDB
 * @subpackage Items
 */
interface ItemInfoInterface extends StringPrimaryRecordInterface
{
    public const KEY_CODE = 'code';
    public const KEY_CATEGORY = 'category';
    public const KEY_NAME = 'name';

    /**
     * Unique ID of the item. This is made up of the
     * mod's UUID and the item's CET code.
     *
     * @return string
     */
    public function getUUID() : string;

    /**
     * The name of the item. This is defined in the
     * {@see self::KEY_NAME} property in the JSON data
     * files.
     *
     * @return string
     */
    public function getName() : string;

    /**
     * The name of the item, prefixed with the category (if any).
     *
     * @return string
     */
    public function getNameWithCategory() : string;

    /**
     * Category of the item, if any. This is defined in the
     * {@see self::KEY_CATEGORY} property in the JSON data
     * files.
     *
     * @return string
     */
    public function getCategory() : string;

    /**
     * The CET item code of the item. This is defined in the
     * {@see self::KEY_CODE} property in the JSON data files.
     *
     * @return string
     */
    public function getItemCode() : string;
    public function getMod(): ModInfoInterface;
    public function getModID() : string;

    /**
     * All authors associated with the item.
     *
     * NOTE: This is inherited from the mod.
     *
     * @return string[]
     */
    public function getAuthors() : array;

    /**
     * All tags associated with the item.
     *
     * NOTE: This is inherited from the mod.
     *
     * @return string[]
     */
    public function getTags() : array;
}
