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

$factory->define(App\Models\RideRating::class, function (Faker $faker, $attributes) {

    return [
        'ride_id' => $attributes['ride_id'] ?? factory(App\Models\Ride::class)->create()->id,
        'modal_problem_id' => $attributes['modal_problem_id'] ?? factory(App\Models\ModalProblem::class)->create()->id,
        'overall_rating' => $faker->numberBetween(1, 5),
        'observations' => $faker->paragraph,
    ];
});
