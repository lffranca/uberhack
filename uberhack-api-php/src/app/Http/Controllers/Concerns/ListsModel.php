<?php
/**
 * Created by PhpStorm.
 * User: esoares
 * Date: 26/02/18
 * Time: 13:50
 */

namespace App\Http\Controllers\Concerns;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \Request;

trait ListsModel
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if (auth()->check()) {
            $this->authorize('list', $this->model);
        }

        if (Request::has('search')) {
            $paginator = $this->search(Request::get('search'));
        } else {
            $paginator = $this->paginate($this->model());
        }

        return $this->toCollectionResponse($paginator);
    }
}
