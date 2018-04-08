<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:55
 */

namespace App\Http\Controllers\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait PaginatesQuery
{
    /**
     * Paginate the given query
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Builder|Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    protected function paginate(Builder $query)
    {
        $query = $query->setEagerLoads([])->with($this->parseIncludes())->select($this->parseColumns());

        $size = $this->parsePageSize();

        if ($size === 'all') {
            return $query->get();
        }

        $query = $this->sort($query);

        return $query->paginate($size);
    }
}
