<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:57
 */

namespace App\Http\Controllers\Concerns;

trait SearchOnModel
{
    public abstract function getSearchSortAliases();

    /**
     * @param $query
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($query)
    {
        $query = $this->model::search($query)
            ->with($this->parseIncludes())
            ->orderBy(...$this->parseSort('-_score', $this->getSearchSortAliases()));

        $pageSize = $this->parsePageSize();

        if ($pageSize === 'all') {
            $collection = $query->get();
        } else {
            $collection = $query->paginate($pageSize);
        }

        $collection->load($this->parseIncludes());

        return $this->resource::collection($collection)->additional([
            'meta' => [
                'model' => $this->model
            ]
        ])->response();
    }
}
