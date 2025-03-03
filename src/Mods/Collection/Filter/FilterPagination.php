<?php
/**
 * @package CPMDB
 * @subpackage Filtering
 */

declare(strict_types=1);

namespace CPMDB\Mods\Collection\Filter;

use AppUtils\PaginationHelper;

/**
 * Pagination handler and helper for filter results.
 *
 * @package CPMDB
 * @subpackage Filtering
 */
class FilterPagination extends PaginationHelper
{
    private BaseFilter $filter;

    public function __construct(BaseFilter $filter, int $totalCount, int $amountPerPage)
    {
        $this->filter = $filter;

        parent::__construct($totalCount, $amountPerPage);
    }

    public function getFilter() : BaseFilter
    {
        return $this->filter;
    }
}
