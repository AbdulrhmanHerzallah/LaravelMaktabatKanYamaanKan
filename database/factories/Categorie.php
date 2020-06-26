<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categorie;
use Faker\Generator as Faker;

$factory->define(Categorie::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'age_start' => $faker->randomElement([10 , 15 , 5]),
        'age_end' => $faker->randomElement([2 , 8 , 3]),
        'lang' => $faker->randomElement(['ar' , 'en']),
        'book_id' => function(){
            return App\Models\Book::all()->random();
        }
    ];
});
