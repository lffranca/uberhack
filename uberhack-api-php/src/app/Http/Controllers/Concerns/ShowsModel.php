<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:41
 */

namespace App\Http\Controllers\Concerns;

trait ShowsModel
{
    /**
     * @param integer|string $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $model = $this->model()
            ->with($this->parseIncludes())
            ->findOrFail($id, $this->parseColumns());

        if (auth()->check()) {
            $this->authorize('show', $model);
        }

        return $this->toSingleResponse($model);
    }
}