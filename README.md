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

### Creating a collection instance

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
