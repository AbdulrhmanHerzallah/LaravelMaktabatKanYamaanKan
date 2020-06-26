<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vacation;
use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(Vacation::class, function (Faker $faker) {
    return [
        'start' => Carbon::now()->isoFormat('YYYY-MM-DD'),
        'end' => Carbon::now()->addDays(30)->isoFormat('YYYY-MM-DD'),
        'commit' => $faker->text(200),
        'user_id' => function(){
            return App\Models\User::all()->random();
        },
        'type' => $faker->randomElement(['n' , 'p'])

    ];
});
