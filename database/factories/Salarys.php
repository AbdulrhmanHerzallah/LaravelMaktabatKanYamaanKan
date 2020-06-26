<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Salary;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    return [
        'value' => $faker->randomElement([300, 400, 800, 1000, 3000, 50, 90]),
        'user_id' => function () {
            return App\Models\User::all()->random();
        },
        'calc' => $faker->randomElement([-300, 400, -800, -1000, 3000, -50, 90]),
    ];
});
