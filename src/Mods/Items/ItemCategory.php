<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use CPMDB\Mods\Mod\ModInfoInterface;
use CPMDB\Mods\Mod\ModItemCollectionInterface;

/**
 * Utility class that is used to group mod items together
 * by their category name.
 *
 * This is returned by {@see ModItemCollectionInterface::getCategorized()}.
 *
 * @package CPMDB
 * @subpackage Items
 */
class ItemCategory
{
    private string $category;
    private ModInfoInterface $mod;

    private array $items = array();

    public function __construct(ModInfoInterface $mod, string $category)
    {
        $this->mod = $mod;
        $this->category = $category;
    }

    public function getName() : string
    {
        return $this->category;
    }

    public function getMod(): ModInfoInterface
    {
        return $this->mod;
    }

    public function add(ItemInfoInterface $item) : void
    {
        $this->items[] = $item;
    }

    public function getAll() : array
    {
        return $this->items;
    }
}
