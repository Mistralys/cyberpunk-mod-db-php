<?php
/**
 * @package Mods
 * @subpackage Screenshots
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod\Screenshots;

/**
 * Single entry of screenshot metadata from the
 * screenshot sidecar file.
 *
 * @package Mods
 * @subpackage Screenshots
 */
class ScreenshotMetaData
{
    private string $screenshotID;
    private string $title;

    public function __construct(string $screenshotID, string $title)
    {
        $this->screenshotID = $screenshotID;
        $this->title = $title;
    }

    public function getScreenshotID() : string
    {
        return $this->screenshotID;
    }

    public function getTitle() : string
    {
        return $this->title;
    }
}
