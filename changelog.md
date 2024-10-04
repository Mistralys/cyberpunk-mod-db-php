## v1.4.0 - Data structure update
- Items: Added `hasCategories()` and `getCategorized()` to the mod item collection.
- Collection: Updated to use the new data structure in DB v2.
- Tags: Added the `Physics` tag.
- Tags: Added the `Gloves` tag.
- Tags: Added the `Neck` tag.
- Tags: Added the helper class `TagNames` for easy name lookup.
- DB: Switched to Mod DB [v2.0.0](https://github.com/Mistralys/cyberpunk-mod-db/releases/tag/2.0.0).

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
