<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\DataWriter;

use AppUtils\FileHelper\FolderInfo;
use AppUtils\FileHelper\SerializedFile;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Mod\ModInfoInterface;

class CacheDataWriter
{
    public const MODS_CACHE_FILE = 'mods.ser';

    private ModCollection $collection;

    /**
     * @var array<string,array<string,mixed>>
     */
    private array $workData = array();
    private FolderInfo $cacheFolder;
    private static bool $cacheEnabled = true;

    public function __construct(ModCollection $collection, FolderInfo $cacheFolder)
    {
        $this->collection = $collection;
        $this->cacheFolder = $cacheFolder;
    }

    public static function isCacheEnabled() : bool
    {
        return self::$cacheEnabled;
    }

    public static function setCacheEnabled(bool $enabled) : void
    {
        self::$cacheEnabled = $enabled;
    }

    public static function clearCache(FolderInfo $cacheFolder) : void
    {
        self::resolveCacheFile($cacheFolder)->delete();
    }

    public function write() : void
    {
        $this->workData = array();

        foreach($this->collection->getAll() as $mod) {
            $this->collectMod($mod);
        }

        self::resolveCacheFile($this->cacheFolder)->putData($this->workData);

        $this->workData = array();
    }

    public static function cacheExists(FolderInfo $cacheFolder) : bool
    {
        return self::resolveCacheFile($cacheFolder)->exists();
    }

    public static function resolveCacheFile(FolderInfo $cacheFolder) : SerializedFile
    {
        return SerializedFile::factory(sprintf(
            '%s/%s',
            $cacheFolder,
            self::MODS_CACHE_FILE
        ));
    }

    private function collectMod(ModInfoInterface $mod) : void
    {
        $categoryID = $mod->getCategory()->getID();

        if(!isset($this->workData[$categoryID])) {
            $this->workData[$categoryID] = array();
        }

        $this->workData[$categoryID][$mod->getID()] = $mod->getRawData()->getData();
    }
}
