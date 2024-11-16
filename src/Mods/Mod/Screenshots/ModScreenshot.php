<?php

declare(strict_types=1);

namespace CPMDB\Mods\Mod\Screenshots;

use AppUtils\ArrayDataCollection;
use AppUtils\FileHelper\FileInfo;

class ModScreenshot implements ModScreenshotInterface
{
    public const META_KEY_TITLE = 'title';

    private FileInfo $imageFile;
    private string $id;
    private ModScreenshotCollection $collection;
    private string $imageURL;
    private ArrayDataCollection $metaData;

    public function __construct(ModScreenshotCollection $collection, string $screenshotID, FileInfo $imageFile, string $imageURL, array $metaData)
    {
        $this->collection = $collection;
        $this->imageFile = $imageFile;
        $this->id = $screenshotID;
        $this->imageURL = $imageURL;
        $this->metaData = ArrayDataCollection::create($metaData);
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
        $title = $this->metaData->getString(self::META_KEY_TITLE);
        if(!empty($title)) {
            return $title;
        }

        if($this->isDefault()) {
            return 'Default mod screenshot';
        }

        return '';
    }
}
