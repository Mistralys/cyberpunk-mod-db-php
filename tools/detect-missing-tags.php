<?php

declare(strict_types=1);

namespace CPMDB\Tools;

use AppUtils\FileHelper\FolderInfo;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Tags\TagCollection;

require_once __DIR__.'/../vendor/autoload.php';

$collection = ModCollection::create(
    FolderInfo::factory(__DIR__.'/../vendor'),
    FolderInfo::factory(__DIR__.'/../tests/cache'),
    ''
);

$allTagNames = array();
foreach($collection->getAll() as $mod) {
    array_push($allTagNames, ...$mod->getTags());
}

$allTagNames = array_unique($allTagNames);
$collection = TagCollection::getInstance();
$missing = array();

foreach($allTagNames as $tagName) {
    if(!$collection->idExists($tagName)) {
        $missing[] = $tagName;
        echo 'Missing tag: '.$tagName.PHP_EOL;
    }
}

$template = <<<'PHP'
<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\Categories\GeneralTagInfo;

class %2$s extends GeneralTagInfo
{
    public const TAG_NAME = '%1$s';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return '%1$s';
    }
}

PHP;

foreach($missing as $tagID) {
    $className = str_replace('-', '', $tagID);

    $content = sprintf(
        $template,
        $tagID,
        $className
    );

    file_put_contents(__DIR__.'/../src/Mods/Tags/Types/'.$className.'.php', $content);
}

echo PHP_EOL;
echo 'NOTE: Run "composer dump-autoload" to update the autoloader.'.PHP_EOL;
