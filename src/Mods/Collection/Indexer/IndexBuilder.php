<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Indexer;

use CPMDB\Mods\Mod\ModInfoInterface;
use Loupe\Loupe\Loupe;

class IndexBuilder
{
    public const KEY_UUID = 'uuid';
    public const KEY_NAME = 'name';
    public const KEY_CATEGORY = 'category';
    public const KEY_AUTHORS = 'authors';
    public const KEY_TAGS = 'tags';

    private IndexManager $manager;
    private Loupe $index;
    private array $indexData = array();

    public function __construct(IndexManager $manager)
    {
        $this->manager = $manager;
        $this->index = $manager->getIndex();
    }

    public function buildIndex(): void
    {
        $this->indexData = array();

        foreach ($this->manager->getCollection()->getAll() as $mod) {
            $this->collectMod($mod);
        }

        $this->index->addDocuments($this->indexData);

        $this->indexData = array();
    }

    private function collectMod(ModInfoInterface $mod) : void
    {
        $this->indexData[] = [
            self::KEY_UUID => $mod->getUuid(),
            self::KEY_NAME => $mod->getName(),
            self::KEY_CATEGORY => $mod->getCategory()->getLabel(),
            self::KEY_AUTHORS => $mod->getAuthors(),
            self::KEY_TAGS => $mod->getTags()
        ];
    }
}
