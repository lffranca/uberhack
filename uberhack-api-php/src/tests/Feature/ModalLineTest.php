<?php

namespace Tests\Feature;

use App\Http\Resources\ModalLine as ModalLineResource;
use App\Models\ModalLine;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\ChecksApiResponse;

class ModalLineTest extends TestCase
{
    use DatabaseTransactions, ChecksApiResponse;

    /** @test */
    public function anyoneCanSearchForModalLines()
    {
        $modalLines = factory(ModalLine::class, 3)->create();
        $query = $modalLines->random()->label;

        $response = $this->getJson("/api/modal_line/search/{$query}");
        $response->assertStatus(200);

        $response->assertExactJson(
            $this->getResponseFromCollection(
                ModalLineResource::collection(
                    ModalLine::search($query)
                        ->paginate(10)
                )
            )
        );
    }
}
