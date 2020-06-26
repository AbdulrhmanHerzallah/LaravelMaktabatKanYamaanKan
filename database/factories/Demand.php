<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Demand;
use Faker\Generator as Faker;

$factory->define(Demand::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'name_id' => function(){
            return App\Models\User::all()->random();
        },
        'sender_id' => function(){
            return App\Models\User::all()->random();
        },
        'status' => $faker->randomElement(['h' , 'n'])
    ];
});
