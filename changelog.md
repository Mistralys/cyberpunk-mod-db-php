## v1.8.0 - Pagination and indexing update
- Filtering: Added pagination support to the filtering.
- Filtering: All results are now paginated.
- Filtering: Added `selectModUUID()` and `selectModID()` to the mod filters.
- Items: Category icons are now available for some mods via `getIconURL()`.
- Items: Added `getCategorized()` in the collection.
- Mods: Added the `ModID` utility made to help working with UUIDs and IDs.
- Database: Added item categories (label and ID) to the full text search index.
- Tools: Added the `build` command.
- Dependencies: Updated to Mod DB [v2.3.0](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.3.0).

## v1.7.0 - Tag improvements (Breaking-S)
- Tags: Added `getFullName()`.
- Tags: Added `getRelatedTags()`.
- Tags: Added `getLinks()`.
- Tags: Fixed some constant names like `BODY_VTKBIG` => `BODY_VTK_BIG`.
- Filtering: Now leveraging the `searchTweaks` key in the database to help finding mods by search terms.
- Database: Big update with a lot more mods and tagging changes.
- Dependencies: Updated to Mod DB [v2.2.0](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.2.0).

### Breaking changes

- `TagInfoInterface::getLabel()` renamed to `getDescription()`.
- Some tag constants in the `TagNames` class have been renamed.

## v1.6.2 - Minor tweaks
- Collections: Fixed the return type docs for the mod collection classes.
- Code: PHPStan checks clean up to level 9.
- Dependencies: Updated to Mod DB [v2.1.2](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.1.2).
- Dependencies: Updated AppUtils Core to [v2.3.3](https://github.com/Mistralys/application-utils-core/releases/tag/2.3.3).

## v1.6.1 - Atelier mods support
- Mods: Added `getAtelier()` to clothing mods.
- Mods: Added the `ModCollectionInterface`.
- Mods: Added the collection factory method `createAteliers()`.
- Ateliers: Added the atelier collection for all atelier mods used by the clothing mods.
- Tags: Added the `AppearanceCreatorMod` tag.
- Tags: Added the `BodyHystEBBN` tag.
- Tags: Added the `BodyHystEBBNRB` tag.
- Tags: Added the `BodySongbird` tag.
- Tags: Added the `Bracelet` tag.
- Tags: Added the `Corset` tag.
- Tags: Added the `Lingerie` tag.
- Tools: Streamlined to use `tools.php` as the main entry point.
- Tools: Added a `build.bat` to execute all required tools.
- Dependencies: Added the `sqlite3` extension as requirement for Loupe.  
- Dependencies: Updated to Mod DB [v2.1.1](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.1.1).

## v1.6.0 - Screenshot update (Breaking-M)
- Mods: Added the `getScreenshotCollection()` method to access the screenshots.
- Mods: Multiple mod screenshots are now supported.
- Tags: Fixed the tag collection's tag loading mechanism.
- DB: Updated to Mod DB [v2.0.10](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.0.10).

### Breaking changes

- The mod methods `hasImage()`, `getImageURL()` and `getImageFile()` have been removed.

## v1.5.2 - Update
- Tags: Added the `Necklace` tag.
- Tags: Added the `Body-Atlas` tag.
- Tags: Added the `Body-VTK-Big` tag.
- Tags: Added the `Body-VTK-Small` tag.
- Tags: Added the `Body-Lush-Large` tag.
- Tags: Added the `Body-SoLush` tag.
- Tags: Added the `Body-Atlas` tag.
- Tags: Added the `Body-Solo-Lush` tag.
- Tags: Now using the categories from the Mod DB.
- Tags: Now using descriptions from the Mod DB as labels.
- Tags: Now using the `fullName` property for abbreviation tags, when available.
- Tools: Added a simple build script batch file.
- DB: Updated to Mod DB [v2.0.9](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.0.9). 

## v1.5.1 - DB Update
- Tags: Added the `AutoScale` tag.
- Tags: Added the `Body-Solo-Ultimate` tag.
- Tags: Added the `Body-Solo-Small` tag.
- Tags: Added the `Body-Valentine` tag.
- DB: Updated to Mod DB [v2.0.6](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.0.6).

## v1.5.0 - Added See Also support
- Mods: Added `hasSeeAlso()` and `getSeeAlso()` to access the See Also section, if any.
- Mods: Added `getLinkedMods()` to get related mods, if any. 
- Mods: Added `getModCollection()` to access the mod collection.
- Mods: Added `getModCollection()` to mod categories.
- DB: Updated to use the data structure additions in Mod DB v2.0.5.
- DB: Upgraded Mod DB to [v2.0.5](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.0.5).

## v1.4.0 - Data structure update (Breaking-XL)
- Items: Added `hasCategories()` and `getCategorized()` to the mod item collection.
- Collection: Updated to use the new data structure in DB v2.
- Tags: Added the `Physics` tag.
- Tags: Added the `Gloves` tag.
- Tags: Added the `Neck` tag.
- Tags: Added the helper class `TagNames` for easy name lookup.
- DB: Switched to Mod DB [v2.0.0](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.0.0).

### Breaking changes

Some method return types and parameters have been updated to handle the new 
data structure. This may require changes in your code, especially regarding
mod item handling, where all items are now categorized by default.

## v1.3.0 - Added the item collection and search
- Collection: Cleaned up interfaces to handle global and mod item collections.
- Items: Introduced the global item collection.
- Items: Added `getTags()` and `getAuthors()`, inherited from the mod.
- Items: Added item filtering capabilities.
- Items: Added `getCETCommand()`.
- Items: Added `getCETCommands()` to the mod item collection.
- Filters: Added filtering by author.
- Core: Refactored for a cleaner class structure.
- Core: PHPStan clean @ level 9.

## v1.2.1 - Cache fixes
- Collection: Fixed the cache not updating with new database releases.
- Index: Fixed clearing the index.
- Index: Now automatically regenerating with new database releases.
- Mods: Fixed the mod images not being found.
- Filters: Added `hasFilters()`.

## v1.2.0 - Search capabilities
- Collection: Added full filtering capabilities.
- Core: Added dependency to `php/loupe` for the searching capabilities.
- Tags: Added the `Earrings` tag.
- Tags: Added the `Torso` tag.
- Tags: Added the `Outfit` tag.

## v1.1.0 - Added data caching
- Added caching of the mod data to improve performance.
- Now clearly distinguishing between a mod's ID and UUID.
- Added all known tags, accessible via `TagCollection`.

## v1.0.0 - Initial feature set 
- Load all clothing mods.
