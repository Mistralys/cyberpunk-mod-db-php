<?php

declare(strict_types=1);

namespace CPMDB\Mods\Collection\DataWriter;

use AppUtils\BaseException;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\FolderInfo;
use AppUtils\FileHelper\SerializedFile;
use AppUtils\FileHelper_Exception;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Collection\ModCollectionException;
use CPMDB\Mods\Mod\ModInfoInterface;
use Throwable;

class CacheDataWriter
{
    public const ERROR_WRITING_CACHE_FAILED = 165401;

    public const CACHING_SYSTEM_VERSION = '3';
    public const MODS_CACHE_FILE = 'mods.ser';
    public const MODS_VERSION_FILE = 'mods.version';

    private ModCollection $collection;

    /**
     * @var array<string,array<string,mixed>>
     */
    private array $workData = array();
    private FolderInfo $cacheFolder;
    private static bool $cacheEnabled = true;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
        $this->cacheFolder = $collection->getCacheFolder();
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
        self::resolveVersionFile($cacheFolder)->delete();
    }

    /**
     * Writes the mod data to the cache file, replacing the
     * existing files if any.
     *
     * @return void
     * @throws ModCollectionException
     */
    public function write() : void
    {
        $this->workData = array();

        foreach($this->collection->getAll() as $mod) {
            $this->collectMod($mod);
        }

        try {
            self::resolveCacheFile($this->cacheFolder)->putData($this->workData);
            self::resolveVersionFile($this->cacheFolder)->putContents(self::resolveCacheVersion($this->collection));
        }
        catch (Throwable $e)
        {
            throw new ModCollectionException(
                'Failed writing the mods cache data',
                '',
                self::ERROR_WRITING_CACHE_FAILED,
                $e
            );
        }

        $this->workData = array();
    }

    /**
     * Generates the cache version string based on the current
     * database version, and the version of the caching system
     * as defined in {@see self::CACHING_SYSTEM_VERSION}.
     *
     * @param ModCollection $collection
     * @return string
     *
     * @throws BaseException
     * @throws FileHelper_Exception
     * @throws ModCollectionException
     */
    private static function resolveCacheVersion(ModCollection $collection) : string
    {
        return 'Mods:v'.$collection->getDBVersion().';Cache:v'.self::CACHING_SYSTEM_VERSION;
    }

    /**
     * Checks whether the mod data cache file exists, and is
     * up to date with the current database version.
     *
     * @param ModCollection $collection
     * @return bool
     *
     * @throws BaseException
     * @throws FileHelper_Exception
     */
    public static function cacheIsValid(ModCollection $collection) : bool
    {
        $cacheFolder = $collection->getCacheFolder();
        $versionFile = self::resolveVersionFile($cacheFolder);

        return
            self::resolveCacheFile($cacheFolder)->exists()
            &&
            $versionFile->exists()
            &&
            $versionFile->getContents() === self::resolveCacheVersion($collection);
    }

    public static function resolveCacheFile(FolderInfo $cacheFolder) : SerializedFile
    {
        return SerializedFile::factory(sprintf(
            '%s/%s',
            $cacheFolder,
            self::MODS_CACHE_FILE
        ));
    }

    public static function resolveVersionFile(FolderInfo $cacheFolder) : FileInfo
    {
        return FileInfo::factory(sprintf(
            '%s/%s',
            $cacheFolder,
            self::MODS_VERSION_FILE
        ));
    }

    private function collectMod(ModInfoInterface $mod) : void
    {
        $categoryID = $mod->getCategory()->getID();

        if(!isset($this->workData[$categoryID])) {
            $this->workData[$categoryID] = array();
        }

        $this->workData[$categoryID][$mod->getModID()] = $mod->getRawData()->getData();
    }
}
