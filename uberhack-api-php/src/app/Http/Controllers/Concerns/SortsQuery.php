<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:56
 */

namespace App\Http\Controllers\Concerns;


use Illuminate\Database\Eloquent\Builder;
use Request;

trait SortsQuery
{
    /**
     * An array of scopes that should be applied for a given
     * sort_by column. Enabling sort by joined columns.
     *
     * @var array
     */
    protected $sortScopes = [];

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return $this|\Illuminate\Database\Eloquent\Builder
     */
    protected function sort(Builder $query)
    {
        if (Request::has('sort_by')) {
            list($column, $direction) = $this->parseSort();

            if (array_key_exists($column, $this->sortScopes)) {
                $query = $query->{$this->sortScopes[$column]}();
            }

            return $query->orderBy(
                $column,
                $direction
            );
        }

        return $query;
    }
}