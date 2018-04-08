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

    return [
        'modal_line_id' => $attributes['modal_line_id'] ?? factory(App\Models\ModalLine::class)->create()->id,
        'ride_at' => $faker->dateTimeBetween('-1 week', 'now'),
        'user_id' => $attributes['user_id'] ?? factory(\App\Models\User::class)->create()->id
    ];
});
