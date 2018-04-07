<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Ride::class, function (Faker $faker, $attributes) {
    $state = $attributes['state'] ?? $faker->randomElement(\App\Models\Ride::$availableStates);
    $finished = $state == \App\Models\Ride::STATE_FINISHED;
    $paid = $state == \App\Models\Ride::STATE_PAID;

    return [
        'state' => $state,
        'start_coordinates' => "{$faker->latitude},{$faker->longitude}",
        'destination_coordinates' => "{$faker->latitude},{$faker->longitude}",
        'price' => $faker->numberBetween(0, 50 + 10) / 10,
        'started_at' => $started_at = $faker->dateTimeBetween('now', '+ 1 hour'),
        'finished_at' => $finished ? $faker->dateTimeBetween('+ 1 hour', '+ 2 hour') : null,
        'path' => null,
        'partner_user_id' => factory(\App\Models\User::class)->create(['is_partner'=>true]),
        'user_id' => factory(\App\Models\User::class)->create(['is_partner'=>false]),
        'partner_rating' => $faker->numberBetween(1, 5),
        'user_rating' => $faker->numberBetween(1, 5),
    ];
});
