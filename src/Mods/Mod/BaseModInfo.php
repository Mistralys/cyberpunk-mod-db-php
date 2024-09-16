<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\ArrayDataCollection;
use AppUtils\ConvertHelper;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\FolderInfo;
use AppUtils\FileHelper\JSONFile;
use CPMDB\Mods\Collection\BaseCategory;

/**
 * Abstract base class for mod information classes.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
abstract class BaseModInfo implements ModInfoInterface
{
    protected JSONFile $dataFile;
    protected string $id;
    protected ?ArrayDataCollection $data = null;
    protected FileInfo $screenFile;
    protected string $dataURL;
    private BaseCategory $category;

    public function __construct(BaseCategory $category, JSONFile $dataFile, FolderInfo $dataFolder, string $dataURL)
    {
        $this->category = $category;
        $this->dataURL = $dataURL;
        $this->dataFile = $dataFile;
        $this->id = $category->getFolderName().'-'.$dataFile->getBaseName();

        $this->screenFile = FileInfo::factory(sprintf(
            '%s/%s.jpg',
            $dataFolder,
            $this->id
        ));
    }

    public function getCategory() : BaseCategory
    {
        return $this->category;
    }

    public function getID(): string
    {
        return $this->id;
    }

    public function getDataFile() : JSONFile
    {
        return $this->dataFile;
    }

    protected function getData() : ArrayDataCollection
    {
        if(!isset($this->data)) {
            $this->data = new ArrayDataCollection($this->dataFile->parse());
        }

        return $this->data;
    }

    public function getName() : string
    {
        return $this->getData()->getString('mod');
    }

    public function hasImage() : bool
    {
        return $this->screenFile->exists();
    }

    public function getImageURL() : string
    {
        return $this->dataURL.'/screens/'.$this->screenFile->getName();
    }

    private ?string $slug = null;

    public function getSlug() : string
    {
        if(!isset($this->slug)) {
            $this->slug = 'mod-'.ConvertHelper::transliterate($this->getName());
        }

        return $this->slug;
    }

    public function getURL() : string
    {
        return $this->getData()->getString('url');
    }

    public function getAuthors() : array
    {
        return $this->getData()->getArray('authors');
    }

    private ?array $tags = null;

    public function getTags() : array
    {
        if(!isset($this->tags)) {
            $this->tags = $this->getData()->getArray('tags');
            if($this->hasAtelier()) {
                $this->tags[] = 'ATL';
            }
            sort($this->tags);
        }

        return $this->tags;
    }

    public function hasTag(string $tag) : bool
    {
        $tag = strtolower($tag);

        foreach($this->getTags() as $modTag) {
            if(strtolower($modTag) === $tag) {
                return true;
            }
        }

        return false;
    }
}
