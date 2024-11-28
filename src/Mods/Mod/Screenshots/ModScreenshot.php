<?php
/**
 * @package Mods
 * @subpackage Screenshots
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod\Screenshots;

use AppUtils\FileHelper\FileInfo;

/**
 * Information on a single screenshot for a mod.
 *
 * @package Mods
 * @subpackage Screenshots
 */
class ModScreenshot implements ModScreenshotInterface
{
    private FileInfo $imageFile;
    private string $id;
    private ModScreenshotCollection $collection;
    private string $imageURL;
    private ScreenshotMetaData $metaData;

    /**
     * @param ModScreenshotCollection $collection
     * @param string $screenshotID
     * @param FileInfo $imageFile
     * @param string $imageURL
     * @param ScreenshotMetaData $metaData
     */
    public function __construct(ModScreenshotCollection $collection, string $screenshotID, FileInfo $imageFile, string $imageURL, ScreenshotMetaData $metaData)
    {
        $this->collection = $collection;
        $this->imageFile = $imageFile;
        $this->id = $screenshotID;
        $this->imageURL = $imageURL;
        $this->metaData = $metaData;
    }

    public function getID() : string
    {
        return $this->id;
    }

    public function isDefault() : bool
    {
        return $this->id === $this->collection->getDefaultID();
    }

    public function getURL() : string
    {
        return $this->imageURL;
    }

    public function getImageFile() : FileInfo
    {
        return $this->imageFile;
    }

    public function getTitle() : string
    {
        return $this->metaData->getTitle();
    }
}
