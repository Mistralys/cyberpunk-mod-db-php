<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod\Screenshots;

use AppUtils\Collections\BaseStringPrimaryCollection;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\FolderInfo;
use AppUtils\FileHelper\JSONFile;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Collection of screenshot files available for a mod.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 *
 * @method ModScreenshotInterface getByID(string $id)
 * @method ModScreenshotInterface getDefault()
 * @method ModScreenshotInterface[] getAll()
 */
class ModScreenshotCollection extends BaseStringPrimaryCollection
{
    public const DEFAULT_ID = '000default';
    private const KEY_SCREENSHOT_ID = 'screenshotID';

    private ModInfoInterface $mod;

    public function __construct(ModInfoInterface $mod)
    {
        $this->mod = $mod;
    }

    public function hasScreenshots() : bool
    {
        return $this->countRecords() > 0;
    }

    public function countScreenshots() : int
    {
        return $this->countRecords();
    }

    public function getMod() : ModInfoInterface
    {
        return $this->mod;
    }

    public function getScreensURL() : string
    {
        return $this->mod->getCategory()->getScreensURL();
    }

    public function getScreensFolder() : FolderInfo
    {
        return $this->mod->getCategory()->getScreensFolder();
    }

    public function getDefaultID() : string
    {
        return self::DEFAULT_ID;
    }

    protected function registerItems(): void
    {
        foreach($this->getDescriptions() as $def) {
            $this->registerScreenshot($def);
        }
    }

    /**
     * @param array<string,scalar> $def
     * @return void
     */
    private function registerScreenshot(array $def) : void
    {
        $fileName = $this->resolveFileName($def[self::KEY_SCREENSHOT_ID]);
        $file = FileInfo::factory($this->getScreensFolder().'/'.$fileName);

        if(!$file->exists()) {
            return;
        }

        $this->registerItem(new ModScreenshot(
            $this,
            $def[self::KEY_SCREENSHOT_ID],
            $file,
            $this->getScreensURL().'/'.$fileName,
            $def
        ));
    }

    private ?JSONFile $sidecarFile = null;

    /**
     * Gets the path to the optional sidecar file used to
     * document additional mod screenshots.
     *
     * @return JSONFile
     */
    public function getSidecarFile() : JSONFile
    {
        if(!isset($this->sidecarFile)) {
            $this->sidecarFile = JSONFile::factory($this->getScreensFolder().'/'.$this->mod->getModID().'.json');
        }

        return $this->sidecarFile;
    }

    /**
     * Gets all screenshot descriptions, including the default
     * screenshot. If no sidecar file is present, only the default
     * screenshot is returned.
     *
     * @return array<int,array{string,scalar}>
     */
    public function getDescriptions() : array
    {
        $sidecarFile = $this->getSidecarFile();

        $descriptions = array();

        $descriptions[] = array(
            self::KEY_SCREENSHOT_ID => self::DEFAULT_ID
        );

        if($sidecarFile->exists()) {
            foreach($sidecarFile->getData() as $suffix => $def) {
                $def[self::KEY_SCREENSHOT_ID] = $suffix;
                $descriptions[] = $def;
            }
        }

        return $descriptions;
    }

    private function resolveFileName(?string $suffix=null) : string
    {
        $fileName = $this->mod->getModID();

        if(!empty($suffix) && $suffix !== self::DEFAULT_ID) {
            $fileName .= '-'.$suffix;
        }

        return $fileName.'.jpg';
    }
}
