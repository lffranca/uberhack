<?php

namespace Tests\Feature;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\Ride as RideResource;
use App\Models\Ride;
use App\Models\RideRating;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Tests\Traits\ChecksApiResponse;

class RideTest extends TestCase
{
    use DatabaseTransactions, ChecksApiResponse;

    /** @test */
    public function authenticatedUserCanListOwnRideRatings()
    {
        $user = factory(User::class)->create();

        // Populate database with some ride ratings that should not be listed
        factory(RideRating::class, 2)->create();

        // Populate database with ratings made by current user
        $userRides = factory(Ride::class, 2)->create(['user_id'=>$user->id]);

        foreach ($userRides as $userRide) {
            factory(RideRating::class, 2)->create(['ride_id' => $userRide->id]);
        }

        // Assets that unauthenticated users will be unauthorized list ratings
        $response = $this->getJson('/api/ride/my');
        $response->assertStatus(401);

        $this->actingAs($user);

        $response = $this->getJson('/api/ride/my');
        $response->assertStatus(200);

        $expectedResponse = $this->getResponseFromCollection(
            RideResource::collection(
                Ride::where('user_id', $user->id)->paginate()
            )
        );

        $response->assertExactJson($expectedResponse);
    }
}
