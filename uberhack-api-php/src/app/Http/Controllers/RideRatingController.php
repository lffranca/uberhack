<?php

namespace App\Http\Controllers;

use App\Http\Requests\RideRating\StoreRequest;
use App\Http\Resources\RideRating as RideRatingResource;
use App\Models\Ride;
use App\Models\RideRating;
use Carbon\Carbon;

class RideRatingController extends BaseController
{
    /**
     * @var string
     */
    protected $model = RideRating::class;

    /**
     * @var string
     */
    protected $resource = RideRatingResource::class;

    /**
     * @param \App\Http\Requests\RideRating\StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $ride = new Ride($request->only([
            'modal_line_id',
        ]));

        $ride->ride_at = new Carbon($request->ride_at);
        $ride->save();

        $ride->ride_rating()->create($request->only([
            'overall_rating',
            'modal_problem_id',
            'observations',
        ]));

        return RideRatingResource::make($ride->ride_rating)->response();
    }

    public function getSearchSortAliases()
    {
        return [];
    }
}
