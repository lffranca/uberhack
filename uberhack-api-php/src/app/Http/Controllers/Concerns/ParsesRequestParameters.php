<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:52
 */

namespace App\Http\Controllers\Concerns;

use Request;

trait ParsesRequestParameters
{
    /**
     * @return array
     */
    protected function parseColumns()
    {
        return explode(',', Request::get('only', '*'));
    }


    /**
     * @return array
     */
    protected function parsePageSize()
    {
        return min(Request::get('page_size', config('api.response.default_page_size')), 50);
    }

    /**
     * Parse requested includes
     * @return array
     */
    protected function parseIncludes()
    {
        if (Request::has('include')) {
            return explode(',', Request::get('include'));
        } else {
            return [];
        }
    }

    /**
     * @param string $default
     * @param array $aliases
     * @return array
     */
    protected function parseSort(string $default = '+id', array $aliases = [])
    {
        $sortBy = Request::get('sort_by', $default);
        $column = substr($sortBy, 1);
        $direction = $sortBy[0] == '+' ? 'asc' : 'desc';

        if (array_key_exists($column, $aliases)) {
            $column = $aliases[$column];
        }

        return [$column, $direction];
    }
}
