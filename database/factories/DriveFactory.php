<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Drive;
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

$factory->define(Drive::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName,
        'address'=>$faker->streetAddress,
        'mobile'=>$faker->e164PhoneNumber,
        'tax_code'=>$faker->ean13,
        'fax' => $faker->ean8,
        // $faker->title,
        'email' => $faker->safeEmail,
        'contacter' => $faker->name,
        'contacter_mobile'=> $faker->e164PhoneNumber
        
    ];
});
