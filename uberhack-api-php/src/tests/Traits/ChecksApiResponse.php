<?php
namespace Tests\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\Resource;

trait ChecksApiResponse {
    /**
     * @param ResourceCollection $resourceCollection
     * @return mixed
     */
    private function getResponseFromCollection(ResourceCollection $resourceCollection, Request $request = null)
    {
        $request = $request ?? new Request();

        return $resourceCollection->toResponse($request)->getData(true);
    }

    /**
     * @param Resource|mixed $resource
     * @param \Illuminate\Http\Request|null $request
     * @return mixed
     */
    private function getResponseFromResource($resource, Request $request = null)
    {
        $request = $request ?? new Request();

        return $resource->toResponse($request)->getData(true);
    }
}