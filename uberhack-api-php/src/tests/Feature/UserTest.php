<?php

namespace Tests\Feature;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    protected $privateStructure = [
        'id',
        'name',
        'cpf'
    ];

    protected $publicStructure = [
        'id',
        'name',
    ];

    /** @test */
    public function itCanRegisterUser()
    {
        $response = $this->postJson('/api/user/register', [
            'name' => 'Jhon',
            'email' => 'jhon.snow@got.com',
            'password' => 'secret',
            'cpf' => '12345678912'
        ]);

        // Assert that the response has the right status code and content
        $response->assertStatus(201);
        $response->assertJsonStructure(
            [
                "data" => [
                    'id',
                    'name',
                    'email',
                ]
            ]
        );

        // Assert that the data was correctly saved on database
        $response = json_decode($response->getContent());
        $user = User::findOrFail($response->data->id);
        $this->assertArraySubset([
            'name' => 'Jhon',
            'email' => 'jhon.snow@got.com'
        ], $user->toArray());

        // Assert that the password was hashed.
        $this->assertNotEquals('secret', $user->password);
        $this->assertTrue(\Hash::check('secret', $user->password));
    }

    /** @test */
    public function userCanUpdateHimself()
    {
        $user = factory(User::class)->create();
        $newData = factory(User::class)->make();

        $this->actingAs($user);

        $response = $this->patchJson("/api/user/{$user->id}", $newData->toArray());

        $response->assertStatus(200);
        $response->assertJsonStructure(["data" => $this->privateStructure]);

        $updatedUser = $user->fresh();

        $this->assertEquals($user->email, $updatedUser->email, 'Failed asserting that user cannot change email.');
        $this->assertEquals($user->cpf, $updatedUser->cpf, 'Failed asserting that user cannot change cpf.');
        $this->assertArraysubset(
            Arr::except($newData->toArray(), ['id', 'email', 'cpf']),
            $updatedUser->toArray(), true, 'Failed asserting that user was updated.'
        );
    }

    /** @test */
    public function userCanSeeHimself()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->getJson("/api/user/{$user->id}");

        // Assert that the response has the right status code and content
        $response->assertStatus(200);
        $response->assertJsonStructure(["data" => $this->privateStructure]);
    }

    /** @test */
    public function guestCanSeeOthers()
    {
        $user = factory(User::class)->create();
        $user->wasRecentlyCreated = false;

        $response = $this->getJson("/api/user/{$user->id}");

        // Assert that the response has the right status code and content
        $response->assertStatus(200);
        $response->assertJson(["data" => UserResource::make($user)->toArray(new Request())], true);
    }

}
