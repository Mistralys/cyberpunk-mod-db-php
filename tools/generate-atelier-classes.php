<?php
/**
 * Tool-script used to dynamically generate all the atelier-related
 * classes based on the mod DB data.
 *
 * @package CPMDB
 * @subpackage Tools
 */

declare(strict_types=1);

namespace CPMDB\Mods\Tools;

use AppUtils\ConvertHelper;
use function CPMDB\Assets\getAteliers;
use function CPMDB\Assets\logInfo;
use const CPMDB\Assets\KEY_ATELIERS_AUTHORS;
use const CPMDB\Assets\KEY_ATELIERS_NAME;
use const CPMDB\Assets\KEY_ATELIERS_URL;

function generateAteliersEnumClass() : void
{
    logInfo('- Generating the AtelierNames enum class');

    $skeleton = <<<'PHP'
<?php

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers;

use function CPMDB\Mods\Tools\generateAteliersEnumClass;

/**
 * Atelier enum class: List of all available atelier mod IDs 
 * as constants for easy access. 
 * 
 * ## Usage
 * 
 * Use the constant values to fetch the according atelier mod
 * using the atelier collection. Example:
 * 
 * ```php
 * use CPMDB\Mods\Ateliers\AtelierCollection;
 * 
 * $collection = AtelierCollection::getInstance();
 * 
 * $atelier = $collection->getByID(AtelierNames::CUBS_CLOSET);
 * ```
 * 
 * @package CPMDB
 * @subpackage Ateliers
 * @auto-generated See {@see generateAteliersEnumClass()}
 */
class AtelierNames
{
%1$s
}
PHP;

    $enumList = array();
    foreach(array_keys(getAteliers()) as $atelierID) {
        $name = strtoupper(ConvertHelper::string2snake($atelierID));
        $enumList[] = sprintf(
            "    public const %s = '%s';",
            $name,
            $atelierID
        );
    }

    sort($enumList);

    $targetFile = __DIR__.'/../src/Mods/Ateliers/AtelierNames.php';

    file_put_contents(
        $targetFile,
        sprintf(
            $skeleton,
            implode(PHP_EOL, $enumList)
        )
    );
}

function generateAtelierCollectionClass() : void
{
    logInfo('- Generating the AtelierCollection class...');

    $skeleton = <<<'PHP'
<?php
/**
 * @package CPMDB
 * @subpackage Ateliers 
 */
 
declare(strict_types=1);

namespace CPMD\Mods\Ateliers;

use AppUtils\Collections\BaseStringPrimaryCollection;
use CPMDB\Mods\Ateliers\AtelierInterface;
use CPMDB\Mods\Collection\ModCollection;
%2$s

/**
 * Atelier collection class: Access all available atelier mods.
 * 
 * @package CPMDB
 * @subpackage Ateliers
 * @auto-generated See {@see generateAtelierCollectionClass()}
 *
 * @method AtelierInterface getByID(string $id)
 * @method AtelierInterface[] getAll()
 * @method AtelierInterface getDefault() 
 * @property array<string,AtelierInterface> $items
 */
class AtelierCollection extends BaseStringPrimaryCollection
{
    private ModCollection $collection;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
    }
    
    /**
     * @return ModCollection
     */
    public  function getModCollection(): ModCollection
    {
        return $this->collection;
    }

    public function getDefaultID(): string
    {
        return NcFashionAtelier::ATELIER_ID;
    }

    protected function registerItems(): void
    {
%1$s    

        uasort($this->items, static function (AtelierInterface $a, AtelierInterface $b) : int {
            return strnatcasecmp($a->getName(), $b->getName());
        });
    }
    
    public function getByURL(string $url) : ?AtelierInterface
    {
        foreach($this->getAll() as $atelier) {
            if($atelier->getURL() === $url) {
                return $atelier;
            }
        }
        
        return null;
    }
}

PHP;

    $classList = array();
    $importList = array();
    foreach(array_keys(getAteliers()) as $atelierID) {
        $className = getAtelierClassName($atelierID);
        $classList[] = sprintf(
            "        \$this->registerItem(new %s(\$this));",
            $className
        );
        $importList[] = sprintf(
            "use CPMDB\Mods\Ateliers\Atelier\%s;",
            $className
        );
    }

    $targetFile = __DIR__.'/../src/Mods/Ateliers/AtelierCollection.php';

    file_put_contents(
        $targetFile,
        sprintf(
            $skeleton,
            implode(PHP_EOL, $classList),
            implode(PHP_EOL, $importList)
        )
    );
}

function generateAtelierClasses() : void
{
    logInfo('- Generating atelier classes...');

    foreach(getAteliers() as $atelierID => $atelierData) {
        generateAtelierClass($atelierID, $atelierData);
    }
}

function getAtelierClassName(string $atelierID) : string
{
    $className = ucfirst(ConvertHelper::string2Camel($atelierID));

    if(!stristr($className, 'Atelier') && !stristr($className, 'Store')) {
        $className .= 'Atelier';
    }

    return $className;
}

function generateAtelierClass(string $id, array $data) : void
{
    $className = getAtelierClassName($id);

    $skeleton = <<<'PHP'
<?php
/**
 * @package CPMDB
 * @subpackage Ateliers
 */

declare(strict_types=1);

namespace CPMDB\Mods\Ateliers\Atelier;

use CPMD\Mods\Ateliers\BaseAtelier;

/**
 * Atelier mod: %6$s
 * 
 * @package CPMDB
 * @subpackage Ateliers 
 * @auto-generated See {@see generateAtelierClasses()}
 */
class %1$s extends BaseAtelier
{
    public const ATELIER_ID = '%2$s';
    public const ATELIER_URL = '%4$s';
    public const ATELIER_NAME = '%3$s';
    
    public const MOD_IDS = array(
%7$s
    );
    
    public function getID(): string
    {
        return self::ATELIER_ID;
    }
    
    public function getName() : string
    {
        return self::ATELIER_NAME; 
    }
    
    public function getURL() : string
    {
        return self::ATELIER_URL; 
    }
    
    public function getAuthors() : array
    {
        return %5$s;
    }
}

PHP;

    $targetFile = sprintf(
        __DIR__.'/../src/Mods/Ateliers/Atelier/%s.php',
        $className
    );

    file_put_contents(
        $targetFile,
        sprintf(
            $skeleton,
            $className,
            $id,
            addslashes($data[KEY_ATELIERS_NAME]),
            addslashes($data[KEY_ATELIERS_URL]),
            formatAuthors($data[KEY_ATELIERS_AUTHORS]),
            $data[KEY_ATELIERS_NAME],
            formatModIDs($data[KEY_ATELIERS_URL])
        )
    );
}

function formatModIDs(string $atelierURL) : string
{
    $result = array();
    foreach(createTestCollection()->getAll() as $mod) {
        if($mod->getAtelierURL() === $atelierURL) {
            $result[] = sprintf("        '%s',", $mod->getID());
        }
    }

    return implode(PHP_EOL, $result);
}

/**
 * @param string[] $authors
 * @return string
 */
function formatAuthors(array $authors) : string
{
    $result = array();
    foreach($authors as $author) {
        $result[] = addslashes($author);
    }

    return sprintf(
        "array('%s')",
        implode("', '", $result)
    );
}

