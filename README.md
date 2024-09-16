# Cyberpunk 2077 Clothing Mods DB: PHP Classes

PHP Classes to access the [Cyberpunk 2077 Clothing Mod DB](https://github.com/Mistralys/cyberpunk-mod-db).

## Requirements

- PHP 8.2 or higher
- [Composer](https://getcomposer.org/)
- Webserver with PHP support

## Installation

1. Require the package using Composer:
2. Ensure that the `vendor` directory is accessible via the webserver.

```bash
composer require mistralys/cyberpunk-mod-db-php
```

## Usage

```php
use CPMDB\Mods\Collection\ModCollection;

// Create a collection instance with the path
// and absolute URL to the vendor directory.
$collection = ModCollection::create(
    __DIR__.'/vendor',
    'http://127.0.0.1/your-app/vendor'
);

// Get all mods
$mods = $collection->getAll();

// Get only clothing mods
$clothing = $collection->categoryClothing()->getAll();

// Get a mod by its ID
$catsuit = $collection->getByID('clothing-catsuit');

// Get the screenshot URL for a mod
if($catsuit->hasImage()) {
    echo '<img src"'.$catsuit->getImageURL().'">';
}
```
