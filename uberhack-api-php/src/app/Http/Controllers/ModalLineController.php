<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\SearchOnModel;
use App\Http\Resources\ModalLine as ModalLineResource;
use App\Models\ModalLine;

class ModalLineController extends BaseController
{
    use SearchOnModel;

    /**
     * @var string
     */
    protected $model = ModalLine::class;

    /**
     * @var string
     */
    protected $resource = ModalLineResource::class;

    /**
     * @param $modal_id
     * @param $query
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search($modal_id, $query)
    {
        $query = $this->model::search($query)
            ->where('modal_id', $modal_id)
            ->with($this->parseIncludes())
            ->orderBy(...$this->parseSort('-_score', $this->getSearchSortAliases()));

        $pageSize = $this->parsePageSize(10);

        if ($pageSize === 'all') {
            $collection = $query->get();
        } else {
            $collection = $query->paginate($pageSize);
        }

        $collection->load($this->parseIncludes());

        return $this->resource::collection($collection)->response();
    }

    public function getSearchSortAliases()
    {
        return [];
    }
}
