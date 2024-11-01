<?php

declare(strict_types=1);

namespace CPMDB\Tools;

use function CPMDB\Assets\getTags;

require_once __DIR__.'/../vendor/autoload.php';

$template = <<<'PHP'
<?php

declare(strict_types=1);

namespace CPMDB\Mods\Tags\Types;

use CPMDB\Mods\Tags\BaseTagInfo;

class %2$s extends BaseTagInfo
{
    public const TAG_NAME = '%1$s';

    protected function _getName(): string
    {
        return self::TAG_NAME;
    }

    public function getLabel(): string
    {
        return '%3$s';
    }
    
    public function getCategory(): string
    {
        return '%4$s';
    }
}

PHP;

foreach(getTags() as $tagName => $tagDef)
{
    $name = str_replace(array(' ', '-'), '', $tagDef['fullName'] ?? $tagName);

    $description = $tagDef['description'] ?? '';
    if($description === $tagName) {
        $description = '';
    }

    if(isset($tagDef['fullName'])) {
        $description = $tagDef['fullName'].' - '.$description;
    }

    $className = str_replace('-', '', $name);

    $content = sprintf(
        $template,
        $tagName,
        $className,
        $description,
        $tagDef['category'] ?? 'General'
    );

    file_put_contents(__DIR__ . '/../src/Mods/Tags/Types/' . $className . '.php', $content);
}

echo PHP_EOL;
echo 'NOTE: Run "composer dump-autoload" to update the autoloader.'.PHP_EOL;
