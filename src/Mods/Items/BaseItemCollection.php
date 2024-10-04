<?php
/**
 * @package CPMDB
 * @subpackage Items
 */

declare(strict_types=1);

namespace CPMDB\Mods\Items;

use AppUtils\Collections\BaseStringPrimaryCollection;
use CPMDB\Mods\Tags\TagCollection;

/**
 * Abstract base class for item collections.
 *
 * @package CPMDB
 * @subpackage Items
 *
 * @method ItemInfoInterface[] getAll()
 * @method ItemInfoInterface getDefault( )
 * @method ItemInfoInterface getByID(string $id)
 */
abstract class BaseItemCollection extends BaseStringPrimaryCollection implements ItemCollectionInterface
{
    /**
     * @var string[]|null
     */
    private ?array $itemCodes = null;

    public function getItemCodes() : array
    {
        if(isset($this->itemCodes)) {
            return $this->itemCodes;
        }

        $this->itemCodes = array();

        foreach($this->getAll() as $item) {
            $this->itemCodes[] = $item->getItemCode();
        }

        return $this->itemCodes;
    }

    public function itemCodeExists(string $itemCode) : bool
    {
        return in_array($itemCode, $this->getItemCodes());
    }

    public function getDefaultID(): string
    {
        if(!empty($this->items)) {
            return $this->items[array_key_first($this->items)]->getID();
        }

        return '';
    }

    /**
     * Gets an item by its in-game item code (the one used in the CET console).
     *
     * @param string $itemCode
     * @return ItemInfoInterface
     * @throws ItemCollectionException
     */
    public function getByItemCode(string $itemCode) : ItemInfoInterface
    {
        foreach($this->getAll() as $item) {
            if($item->getItemCode() === $itemCode) {
                return $item;
            }
        }

        throw new ItemCollectionException(
            'Item not found by its code.',
            sprintf(
                'Item with code [%s] not found in the collection. '.PHP_EOL.
                'Available codes are: '.PHP_EOL.
                '%s',
                $itemCode,
                implode(', ', $this->getItemCodes())
            ),
            ItemCollectionException::ERROR_ITEM_CODE_NOT_FOUND
        );
    }

    public function collectTags() : array
    {
        $tagLists = array();

        foreach($this->getCategories() as $category) {
            $tagLists[] = $category->getTags();
        }

        return TagCollection::mergeTags(...$tagLists);
    }

    /**
     * Dumps a list of all items to the console.
     * @return void
     */
    public function dumpItems() : void
    {
        foreach($this->getAll() as $item) {
            echo sprintf(
                    '- "%s" by %s [%s]',
                    $item->getFullName(),
                    implode(', ', $item->getAuthors()),
                    $item->getItemCode()
                ).PHP_EOL;
        }
    }
}
