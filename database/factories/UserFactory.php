<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'phone_number' => $faker->phoneNumber,
        'national_identity' => $faker->bankAccountNumber,
        'social_insurance_number' => $faker->bankAccountNumber,
        'data_subscribe_social' => $faker->date(),
        'gender' => $faker->randomElement(['m' , 'f']),
        'lang' => $faker->randomElement(['ar' , 'en']),
        'remember_token' => Str::random(10),
        'permission' => $faker->randomElement([1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9])
    ];
});
