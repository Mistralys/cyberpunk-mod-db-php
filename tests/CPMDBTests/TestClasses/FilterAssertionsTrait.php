<?php

declare(strict_types=1);

namespace CPMDBTests\TestClasses;

use CPMDB\Mods\Collection\ModFilter;

trait FilterAssertionsTrait
{
    public function assertResultsContainID(string $id, ModFilter $filter) : void
    {
        $ids = $filter->getModIDs();

        $this->assertContains(
            $id,
            $ids,
            sprintf(
                'No mod with ID [%s] found in results. '.PHP_EOL.
                'Available IDs: '.PHP_EOL.
                '- %s',
                $id,
                implode(PHP_EOL.'- ', $ids)
            )
        );
    }
}
