<?php
/**
 * @package CPMDB
 * @subpackage Mod Collection
 */

declare(strict_types=1);

namespace CPMDB\Mods\Mod;

use AppUtils\ConvertHelper;
use AppUtils\Interfaces\StringableInterface;
use CPMDB\Mods\Collection\ClothingCategory;

/**
 * Helper class to parse and manipulate mod IDs.
 *
 * This will seamlessly add the category if it is not
 * present in a mod ID, using the default category.
 *
 * @package CPMDB
 * @subpackage Mod Collection
 */
class ModID implements StringableInterface
{
    public const DEFAULT_MOD_CATEGORY = ClothingCategory::CATEGORY_ID;
    private mixed $category;
    private mixed $id;

    public function __construct(string $id)
    {
        $def = self::splitID($id);
        $this->category = $def['category'];
        $this->id = $def['id'];
    }

    /**
     * Converts a list of mod ID, mod UUID or ModID
     * instances to a list of UUID strings.
     *
     * @param array<int|string,string|ModID> $list
     * @return string[] List of unique mod UUIDs, sorted alphabetically.
     */
    public static function list2UUIDStrings(array $list) : array
    {
        $result = array();
        foreach($list as $mod) {
            $result[] = self::create($mod)->getModUUID();
        }

        $result = array_unique($result);

        sort($result);

        return $result;
    }

    /**
     * Converts a list of mod ID, mod UUID or ModID
     * instances to a list of ModID instances.
     *
     * @param array<int|string,string|ModID> $list
     * @return ModID[] List of unique mod IDs, sorted alphabetically by UUID.
     */
    public static function list2UUIDs(array $list) : array
    {
        $result = array();
        foreach($list as $mod) {
            $id = self::create($mod);
            $result[$id->getModUUID()] = $id;
        }

        ksort($result);

        return array_values($result);
    }

    /**
     * @param string $id
     * @return array{category: string, id: string}
     * @throws ModException {@see ModException::ERROR_UNRECOGNIZED_ID_FORMAT}
     */
    public static function splitID(string $id) : array
    {
        if(!str_contains($id, '.')) {
            return array(
                'category' => self::DEFAULT_MOD_CATEGORY,
                'id' => $id
            );
        }

        $parts = ConvertHelper::explodeTrim('.', $id);
        if(count($parts) === 2) {
            return array(
                'category' => $parts[0],
                'id' => $parts[1]
            );
        }

        throw new ModException(
            'Unrecognized Mod ID format.',
            sprintf(
                'The ID [%s] does not match the expected format of [category.id].',
                $id
            ),
            ModException::ERROR_UNRECOGNIZED_ID_FORMAT
        );
    }

    public function getCategoryID() : string
    {
        return $this->category;
    }

    public function getModID() : string
    {
        return $this->id;
    }

    public function getModUUID() : string
    {
        return $this->category.'.'.$this->id;
    }

    public static function create(string|ModID $id) : self
    {
        if($id instanceof ModID) {
            return $id;
        }

        return new ModID($id);
    }

    public function __toString(): string
    {
        return $this->getModUUID();
    }
}
