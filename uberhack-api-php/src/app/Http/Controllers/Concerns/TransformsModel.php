<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:44
 */

namespace App\Http\Controllers\Concerns;

trait TransformsModel
{
    /**
     * @var string|\Illuminate\Http\Resources\Json\Resource
     */
    protected $resource;

    /**
     * Create a Single Response from given Model
     * @param array $parameters
     * @return \Illuminate\Http\JsonResponse
     */
    public function toSingleResponse(...$parameters)
    {
        return $this->resource::make(...$parameters)->response();
    }

    /**
     * Create a Collection Response from given Collection
     * @param $resource
     * @return \Illuminate\Http\JsonResponse
     */
    public function toCollectionResponse($resource)
    {
        return $this->resource::collection($resource)->response();
    }
}
