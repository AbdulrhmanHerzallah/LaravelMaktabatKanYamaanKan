<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Expense;
use Faker\Generator as Faker;

$factory->define(Expense::class, function (Faker $faker) {
    return [
        'value' => $faker->randomElement([300, 400, 800, 1000, 3000, 50, 90]),
        'type' => $faker->randomElement(['in' , 'ou']),
        'note' => $faker->text(10),
    ];
});
