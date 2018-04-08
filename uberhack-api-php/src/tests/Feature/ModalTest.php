<?php

namespace Tests\Feature;

use App\Http\Resources\Modal as ModalResource;
use App\Models\Modal;
use App\Models\ModalLine;
use App\Models\ModalProblem;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\ChecksApiResponse;

class ModalTest extends TestCase
{
    use DatabaseTransactions, ChecksApiResponse;

    /** @test */
    public function anyoneCanListModals()
    {
        factory(Modal::class,3)->create();

        $response = $this->getJson('/api/modal');
        $response->assertStatus(200);

        // @todo: this test relies on ModalResource. Create UnitTest to it
        $expectedResponse = $this->getResponseFromCollection(
            ModalResource::collection(Modal::paginate(config('api.response.default_page_size')))
        );

        $response->assertExactJson($expectedResponse);
    }

    /** @test */
    public function anyoneViewAnModal()
    {
        $modal = factory(Modal::class)->create();

        $response = $this->get("/api/modal/{$modal->id}");

        $response->assertStatus(200);

        // @todo: this test relies on ModalResource. Create UnitTest to it
        $expectedResponse = $this->getResponseFromResource(
            ModalResource::make(Modal::find($modal->id))
        );

        $response->assertExactJson($expectedResponse);
    }

    /** @test */
    public function anyoneCanListModalsIncludingRelationships()
    {
        $modals = factory(Modal::class,3)->create();

        foreach($modals as $modal) {
            factory(ModalLine::class, 3)->create(['modal_id' => $modal->id]);
            factory(ModalProblem::class, 3)->create(['modal_id' => $modal->id]);
        }

        $includes = [
            'modal_lines',
            'modal_problems',
        ];

        $response = $this->getJson('/api/modal?include=' . implode(',', $includes));
        $response->assertStatus(200);

        // @todo: this test relies on ModalResource. Create UnitTest to it
        $expectedResponse = $this->getResponseFromCollection(
            ModalResource::collection(
                Modal::with($includes)->paginate(config('api.response.default_page_size'))
            )
        );

        $response->assertExactJson($expectedResponse);
    }

//    /** @test */
//    public function anyoneCanSearchForModals()
//    {
//        $modalCategories = factory(Modal::class, 3)->create();
//        $query = $modalCategories->random()->name;
//
//        $response = $this->getJson("/api/modal/search/{$query}");
//        $response->assertStatus(200);
//
//        $response->assertExactJson(
//            $this->getResponseFromCollection(
//                ModalResource::collection(
//                    Modal::search($query)
//                        ->take(10)
//                        ->get()
//                )
//            )
//        );
//    }
}
