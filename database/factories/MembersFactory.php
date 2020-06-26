<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'phone' => '98304517',
        'national_identity' => $faker->phoneNumber,
        'gender' => $faker->randomElement(['m' , 'f']),
        'member_id' => rand()
    ];
});
