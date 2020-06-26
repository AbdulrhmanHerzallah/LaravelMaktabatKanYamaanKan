<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SalaryInfo;
use Faker\Generator as Faker;

$factory->define(SalaryInfo::class, function (Faker $faker) {
    return [
        'salary_fix' => $faker->randomElement([300, 400, 800, 1000, 3000, 50, 90]),
        'start_decade' => $faker->date(),
        'end_decade' => $faker->date(),
        'user_id' => function () {
            return App\Models\User::all()->random();
        },
    ];
});
