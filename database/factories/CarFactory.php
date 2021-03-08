<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Car;
use Illuminate\Support\Str;
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

$factory->define(Car::class, function (Faker $faker) {
    return [
        'number_plate' => rand(1000,9999),
        // $faker->title,
        'manufacturer_id' => rand(1,10),
        'type' => rand(1,2),
        'color'=> $faker->hexcolor,
        'seat_number' => '10',
        'origin'=>$faker->country,
        'driver_id' => '10'
    ];
});
