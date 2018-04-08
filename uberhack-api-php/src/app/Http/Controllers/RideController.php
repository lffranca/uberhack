<?php

namespace App\Http\Controllers;

use App\Http\Resources\Ride as RideResource;
use App\Models\Ride;
use Auth;

class RideController extends BaseController
{
    /**
     * @var string
     */
    protected $model = Ride::class;

    /**
     * @var string
     */
    protected $resource = RideResource::class;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function listMyRides()
    {
        $rides = Ride::where('user_id', Auth::id());

        return $this->toCollectionResponse(
            $this->paginate($rides)
        );
    }

    public function getSearchSortAliases()
    {
        return [];
    }
}
