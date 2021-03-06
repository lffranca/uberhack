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

$factory->define(App\Models\Modal::class, function (Faker $faker, $attributes) {

    return [
        'label' => $faker->words(mt_rand(1,3), true),
        'icon' => 'car',
    ];
});
