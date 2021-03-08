<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Expert;
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

$factory->define(Expert::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName,
        'address'=>$faker->streetAddress,
        'mobile'=>$faker->e164PhoneNumber,
        'tax_code'=>$faker->ean13,
        'payment_type' => rand(1,2),
        'point_total' => rand(10,100),
        'images' => imageUrl($width = 640, $height = 480),
        'birthday' => date($format = 'd-m-Y', $max = 'now'),
        'email' => $faker->safeEmail,
        'country' => $faker->country,
        'sex'=> rand(1,2),
        'company_id'=> rand(1,10)

        
    ];
});
