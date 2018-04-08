<?php

namespace Tests\Feature;

use App\Http\Resources\RideRating as RideRatingResource;
use App\Models\Modal;
use App\Models\ModalLine;
use App\Models\ModalProblem;
use App\Models\Ride;
use App\Models\RideRating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\ChecksApiResponse;

class RideRatingTest extends TestCase
{
    use DatabaseTransactions, ChecksApiResponse;

    /** @test */
    public function authenticatedUserCanRegisterRideRating()
    {
        $user = factory(User::class)->create();

        $modalLine = factory(ModalLine::class)->create();
        $modalProblem = factory(ModalProblem::class)->create(['modal_id' => $modalLine->modal_id]);

        $payload = [
            'modal_line_id' => $modalLine->id,
            'modal_problem_id' => $modalProblem->id,
            'ride_at' => Carbon::now()->subDay(1)->toIso8601String(),
            'overall_rating' => mt_rand(1,5),
            'observations' => 'Lorem ipsum.'
        ];

        // Assets that unauthenticated users will be unauthorized to register a RideRating
        $response = $this->postJson('/api/ride/rating', $payload);
        $response->assertStatus(401);

        $this->actingAs($user);

        $response = $this->postJson('/api/ride/rating', $payload);
        $response->assertStatus(200);

        $expectedModel = RideRating::findOrFail($response->json()['data']['id']);

        $response->assertExactJson(
            $this->getResponseFromResource(
                RideRatingResource::make($expectedModel)
            )
        );

        $this->assertEquals($user->id, $expectedModel->ride->user_id);
    }
}
