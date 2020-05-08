<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Animal;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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

$factory->define(Animal::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'species_id' => \App\Species::all()->random()->id,
        'nickname' => $faker->name,
        'image' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
