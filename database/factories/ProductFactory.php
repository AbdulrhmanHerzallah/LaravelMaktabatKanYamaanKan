<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'price' => $faker->randomElement([50,90,51,78]),
        'dis_account' => $faker->randomElement([-5,-8,-8,-75 , 0]),
        'quantity' => $faker->randomElement([7 , 8 , 1]),
        'bill_id' => function(){
            return App\Models\Bill::all()->random();
        },
        'note' => $faker->lastName


    ];
});
