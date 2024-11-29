<?php
/**
 * Utility script used to generate the {@see \CPMDB\Mods\Tags\TagNames} class
 * from the available tags in the tag collection.
 *
 * @package CPMDB
 * @subpackage Tools
 */

declare(strict_types=1);

namespace CPMDB\Tools;

use AppUtils\ClassHelper;
use CPMDB\Mods\Tags\TagCollection;
use function CPMDB\Assets\logInfo;

function generateTagsEnumClass() : void
{
    logInfo('- Generating the tag name enum class.');

    $imports = array();
    $constants = array();

    foreach (getCollatedTagInfos() as $tagDef)
    {
        $imports[] = sprintf(
            "use CPMDB\Mods\Tags\Types\%s;",
            $tagDef['className']
        );

        $constants[] = sprintf(
            '    public const %s = %s::TAG_NAME;',
            $tagDef['constantName'],
            $tagDef['className']
        );
    }

    sort($imports);
    sort($constants);

    $template = <<<'PHP'
<?php
/**
 * @package CPMDB
 * @subpackage Tags 
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tags;

%1$s

/**
 * Helper class with all tag names for easy lookup,
 * instead of using the class names directly.
 * 
 * NOTE: This imports all tag classes, so if you just
 * need a few, it's better to import them separately.
 * 
 * **Auto-generated file, do not edit!**
 * 
 * See `/tools/generate-tag-names.php` for more info.
 * 
 * @package CPMDB
 * @subpackage Tags 
 */
class TagNames
{
%2$s
}

PHP;

    file_put_contents(
        __DIR__ . '/../src/Mods/Tags/TagNames.php',
        sprintf(
            $template,
            implode(PHP_EOL, $imports),
            implode(PHP_EOL, $constants)
        )
    );
}
