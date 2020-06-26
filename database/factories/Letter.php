<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Letter;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Letter::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'body' => $faker->text,
        'lett_data' => Carbon::now()->isoFormat('YYYY-MM-DD'),
        'user_id' => function(){
            return App\Models\User::all()->random();
        }
    ];
});
