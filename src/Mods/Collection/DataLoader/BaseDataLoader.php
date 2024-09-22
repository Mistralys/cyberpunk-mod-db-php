<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\DataLoader;

use AppUtils\ArrayDataCollection;
use AppUtils\ClassHelper;
use CPMDB\Mods\Collection\BaseCategory;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Mod\ModInfoInterface;

/**
 * Abstract base class for mod data loaders, which are used
 * to load the mod data into memory and instantiate the mod
 * objects.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
abstract class BaseDataLoader implements DataLoaderInterface
{
    protected ModCollection $collection;

    /**
     * @var callable
     */
    protected $registerCallback;

    public function __construct(ModCollection $collection, callable $registerCallback)
    {
        $this->collection = $collection;
        $this->registerCallback = $registerCallback;
        $this->collection->onModsLoaded($this->handleModsLoaded(...));
    }

    /**
     * Called when all mods have been loaded by the collection.
     * @return void
     */
    protected abstract function handleModsLoaded() : void;

    final public function registerCategoryMods(BaseCategory $category) : void
    {
        foreach($this->getIDsByCategory($category) as $modID) {
            $this->registerCategoryMod($category, $modID);
        }
    }

    private function registerCategoryMod(BaseCategory $category, string $modID) : void
    {
        $modClass = $category->getModClass();

        $this->registerItem(ClassHelper::requireObjectInstanceOf(
            ModInfoInterface::class,
            new $modClass(
                $modID,
                $category,
                ArrayDataCollection::create($this->loadModData($category, $modID))
            )
        ));
    }

    final protected function registerItem(ModInfoInterface $mod) : void
    {
        call_user_func($this->registerCallback, $mod);
    }
}
