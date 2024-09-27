<?php

declare(strict_types=1);

namespace CPMDBTests\TestClasses;

use CPMDB\Mods\Mod\ItemCollectionInterface;

trait ItemCollectionAssertionsTrait
{
    public function assertItemsContainCode(string $itemCode, ItemCollectionInterface $collection) : void
    {
        $this->assertTrue(
            $collection->itemCodeExists($itemCode),
            sprintf(
                'Item with code [%s] not found in the collection. '.PHP_EOL.
                'Collection contains: '.PHP_EOL.
                '- %s',
                $itemCode,
                implode(PHP_EOL.'- ', $collection->getItemCodes())
            )
        );
    }

    public function assertItemsContainUUID(string $uuid, ItemCollectionInterface $collection) : void
    {
        $this->assertTrue(
            $collection->idExists($uuid),
            sprintf(
                'Item with UUID [%s] not found in the collection. '.PHP_EOL.
                'Collection contains: '.PHP_EOL.
                '- %s',
                $uuid,
                implode(PHP_EOL.'- ', $collection->getIDs())
            )
        );
    }
}
