<?php

declare(strict_types=1);

namespace CPMDBTests\TestClasses;

use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * @see ModAssertionsInterface
 */
trait ModAssertionsTrait
{
    protected function assertModIsLinkedWith(ModInfoInterface $mod, string $modID) : void
    {
        $ids = $mod->getLinkedModIDs();

        $this->assertContains(
            $modID,
            $ids,
            sprintf(
                'The mod [%s] is not linked with the expected mod. '.PHP_EOL.
                'Current linked mods: '.PHP_EOL.
                '- [%s]',
                $modID,
                implode(PHP_EOL.'- ', $ids)
            )
        );
    }
}
