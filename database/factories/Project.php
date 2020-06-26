<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'start' => Carbon::now()->isoFormat('YYYY-MM-DD'),
        'end' => Carbon::now()->addDays(8)->isoFormat('YYYY-MM-DD'),
        'body' => $faker->text,
        'user_id' => function(){
            return App\Models\User::all()->random();
        }
    ];
});
