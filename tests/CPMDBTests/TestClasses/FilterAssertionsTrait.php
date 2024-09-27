<?php

declare(strict_types=1);

namespace CPMDBTests\TestClasses;

use CPMDB\Mods\Collection\Filter\FilterInterface;

trait FilterAssertionsTrait
{
    public function assertResultsContainPrimaryID(string $id, FilterInterface $filter) : void
    {
        $ids = $filter->getPrimaryIDs();

        $this->assertContains(
            $id,
            $ids,
            sprintf(
                'No elements with primary ID [%s] found in results. '.PHP_EOL.
                'Available IDs: '.PHP_EOL.
                '- %s',
                $id,
                implode(PHP_EOL.'- ', $ids)
            )
        );
    }
}
