<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bill;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;


$factory->define(Bill::class, function (Faker $faker) {
    return [
        'bill_name' => $faker->firstName . Str::random(),
        'bill_number' => rand(),
        'date' => Carbon::now()->isoFormat('YYYY-MM-DD'),
        'clint_name' => $faker->lastName,
        'clint_phone' => '05885151',
        'clint_address' => 'Gaza Strip',
        'user_id' => function(){
            return App\Models\User::all()->random();
        }
    ];
});
