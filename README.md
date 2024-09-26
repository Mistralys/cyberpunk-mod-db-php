# Cyberpunk 2077 Clothing Mods DB: PHP Classes

PHP Classes to access the [Cyberpunk 2077 Clothing Mod DB](https://github.com/Mistralys/cyberpunk-mod-db).

## Requirements

- PHP 8.2 or higher
- [Composer](https://getcomposer.org/)
- Webserver with PHP support

## Installation

1. Require the package using Composer
2. Ensure that the `vendor` directory is accessible via the webserver.

```bash
composer require mistralys/cyberpunk-mod-db-php
```

## Usage

### Creating the collection

The collection class is the main entry point to the mod database. 
It provides methods to access all mods, as well as the filtering
capabilities.

```php
use CPMDB\Mods\Collection\ModCollection;

// Create a collection instance
$collection = ModCollection::create(
    __DIR__.'/vendor', // Absolute path to the composer vendor directory
    __DIR__.'/cache', // Path to a writable directory to store cache files
    'http://127.0.0.1/your-app/vendor' // Absolute URL to the composer vendor directory
);

// Get all mods
$mods = $collection->getAll();

// Get only clothing mods
$clothing = $collection->categoryClothing()->getAll();

// Get a mod by its UUID (unique identifier, category ID + mod ID)
$catsuit = $collection->getByID('clothing.catsuit');

// Get the screenshot URL for a mod
if($catsuit->hasImage()) {
    echo '<img src"'.$catsuit->getImageURL().'">';
}
```

### Filtering

Use the filter to search for specific mods by search terms and/or tags.

```php
use CPMDB\Mods\Collection\ModCollection;
use \CPMDB\Mods\Tags\Types\Outfit;

// Create a collection instance
$collection = ModCollection::create(
    __DIR__.'/vendor', // Absolute path to the composer vendor directory
    __DIR__.'/cache', // Path to a writable directory to store cache files
    'http://127.0.0.1/your-app/vendor' // Absolute URL to the composer vendor directory
);

// Search for "catsuit" and only get mods with the "Outfit" tag
$mods = $collection->createFilter()
    ->selectSearchTerm('catsuit')
    ->selectTag(Outfit::TAG_NAME)
    ->getMods();
```

### Caching

By default, the collection will cache the mod data in the specified 
cache directory. This is done for performance reasons, as the mod data
is read from my individual files in the filesystem. 

The cache is created automatically the first time a collection instance is created.

#### Turning off caching

The caching can be turned off if needed:

```php
use CPMDB\Mods\Collection\DataWriter\CacheDataWriter;

CacheDataWriter::setCacheEnabled(false);
```

#### Performance tests

To check the performance of the caching on your system, you can run 
the performance tests:

```bash
php tests/performance/performance-test.php
```

## Tags

Tags are used to categorize mods, using simple strings defined in the mod files
(e.g. `CET` for the Cyber Engine Tweaks mod). All known tags used in the mod DB
are included in the package.

> Tags also have additional meta-data, such as a label and a category.

### Tag name constants

Tags can be referenced in code using the matching tag classes, which all have
a constant with the tag's name. This makes it easier to avoid typos.

```php
$cetTag = \CPMDB\Mods\Tags\Types\CyberEngineTweaks::TAG_NAME;
$clothingTag = \CPMDB\Mods\Tags\Types\Clothing::TAG_NAME;
```

### Getting all known tags

All known tags are available via the `TagCollection` class, which has methods
to access them.

```php
use CPMDB\Mods\Tags\TagCollection;
use CPMDB\Mods\Tags\Types\CyberEngineTweaks;

$collection = TagCollection::getInstance();

// Get all tags
$all = $collection->getAll();

// Get a specific tag
$cet = $collection->getByID(CyberEngineTweaks::TAG_NAME);

// Additional tag meta data
echo 'Full label: '.$cet->getLabel();
echo 'Tag category: '.$cet->getCategory();
```
