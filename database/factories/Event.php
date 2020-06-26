<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(Event::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'title' =>  $faker->text(30),
        'color' =>  $faker->hexColor,
        'start' =>  Carbon::now()->isoFormat('YYYY-MM-DD'),
        'end' =>    Carbon::now()->addDays(30)->isoFormat('YYYY-MM-DD'),
        'user_id' => function(){
            return App\Models\User::all()->random();
        }
    ];
});
