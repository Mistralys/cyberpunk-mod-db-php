<?php

declare(strict_types=1);

namespace CPMDB\Tools;

use AppUtils\FileHelper;
use AppUtils\FileHelper\FileInfo;
use AppUtils\FileHelper\FolderInfo;
use function CPMDB\Assets\getTags;
use function CPMDB\Assets\logInfo;
use function CPMDB\Mods\Tools\renderUses;
use const CPMDB\Assets\KEY_TAG_DEFS_CATEGORY;
use const CPMDB\Assets\KEY_TAG_DEFS_DESCRIPTION;
use const CPMDB\Assets\KEY_TAG_DEFS_FULL_NAME;
use const CPMDB\Assets\KEY_TAG_DEFS_LINKS;
use const CPMDB\Assets\KEY_TAG_DEFS_LINKS_LABEL;
use const CPMDB\Assets\KEY_TAG_DEFS_LINKS_URL;
use const CPMDB\Assets\KEY_TAG_DEFS_RELATED_TAGS;

function generateTagClasses() : void
{
    logInfo('- Generating missing tag classes.');

    // Remove all existing tag classes
    $tagFolder = FolderInfo::factory(__DIR__ . '/../src/Mods/Tags/Types');
    FileHelper::deleteTree($tagFolder);

    $template = <<<'PHP'
<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;%7$s

/**
 * Information about the %1$s tag.
 * 
 * NOTE: This class is auto-generated. 
 * 
 * @package CPMDB
 * @subpackage Tags
 * @auto-generated {@see \CPMDB\Tools\generateTagClasses()}
 */
class %2$s extends BaseTagInfo
{
    public const TAG_NAME = '%1$s';
    
    public const RELATED_TAGS = array(%6$s);
   
    protected function _getName(): string
    {
        return self::TAG_NAME;
    }
    
    /**
     * Full name of the tag if it's an acronym or abbreviation.
     * Example: "ArchiveXL" for the "AXL" tag.
     * 
     * @return string
     */
    public function getFullName(): string
    {
        return '%5$s';
    }

    public function getDescription(): string
    {
        return '%3$s';
    }
    
    public function getCategory(): string
    {
        return '%4$s';
    }
    
    protected function _getLinks() : array
    {
        return array(%8$s);
    }
}

PHP;

    foreach (getCollatedTagInfos() as $tagName => $tagDef)
    {
        $uses = array();
        $relatedTags = renderRelatedTagConstants($tagDef['relatedTags']);

        if(!empty($relatedTags)) {
            $uses[] = 'CPMDB\Mods\Tags\TagNames';
        }

        if(!empty($tagDef['links'])) {
            $uses[] = 'CPMDB\Mods\Tags\TagLink';
        }

        $content = sprintf(
            $template,
            $tagName, // 1
            $tagDef['className'], // 2
            addslashes($tagDef['description']), // 3
            addslashes($tagDef['category']), // 4
            $tagDef['fullName'], // 5
            $relatedTags, // 6
            renderUses($uses), // 7
            renderTagLinks($tagDef['links']) // 8
        );

        FileInfo::factory($tagFolder . '/' . $tagDef['className'] . '.php')
            ->putContents($content);
    }
}

function renderTagLinks(array $links) : string
{
    if(empty($links)) {
        return '';
    }

    $lines = array();
    foreach($links as $linkDef) {
        $lines[] = sprintf(
            "            new TagLink(\$this, '%s', '%s')",
            addslashes($linkDef[KEY_TAG_DEFS_LINKS_URL]),
            addslashes($linkDef[KEY_TAG_DEFS_LINKS_LABEL])
        );
    }

    return PHP_EOL.implode(','.PHP_EOL, $lines).PHP_EOL.'        ';
}

function getCollatedTagInfos() : array
{
    $info = array();

    foreach (getTags() as $tagName => $tagDef)
    {
        $description = $tagDef[KEY_TAG_DEFS_DESCRIPTION] ?? '';
        if ($description === $tagName) {
            $description = '';
        }

        $fullName = $tagName;
        if (isset($tagDef[KEY_TAG_DEFS_FULL_NAME])) {
            $fullName = $tagDef[KEY_TAG_DEFS_FULL_NAME];
        }

        $info[$tagName] = array(
            'className' => resolveTagClassName($tagName, $tagDef[KEY_TAG_DEFS_FULL_NAME] ?? null),
            'constantName' => resolveTagConstantName($tagName, $tagDef[KEY_TAG_DEFS_FULL_NAME] ?? null),
            'fullName' => $fullName,
            'description' => $description,
            'category' => $tagDef[KEY_TAG_DEFS_CATEGORY] ?? 'General',
            'relatedTags' => $tagDef[KEY_TAG_DEFS_RELATED_TAGS] ?? array(),
            'links' => $tagDef[KEY_TAG_DEFS_LINKS] ?? array()
        );
    }

    return $info;
}

function resolveTagClassName(string $tagName, ?string $fullName) : string
{
    $name = str_replace(array(' ', '-'), '', $fullName ?? $tagName);

    return str_replace('-', '', $name);
}

function resolveTagConstantName(string $tagName, ?string $fullName) : string
{
    $name = str_replace(array(' ', '-'), '_', $fullName ?? $tagName);

    $name = preg_replace("/([a-z])([A-Z])/", "$1_$2", $name);

    return strtoupper($name);
}

function renderRelatedTagConstants(array $related) : string
{
    $tagInfos = getCollatedTagInfos();
    $lines = array();
    foreach($related as $tagName) {
        if(!isset($tagInfos[$tagName])) {
            logInfo(sprintf('Warning: Related tag [%s] not found.', $tagName));
            continue;
        }

        $constantName = $tagInfos[$tagName]['constantName'];
        $lines[] = '        TagNames::'.$constantName;
    }

    if(!empty($lines)) {
        return PHP_EOL.implode(','.PHP_EOL, $lines).PHP_EOL.'    ';
    }

    return '';
}
