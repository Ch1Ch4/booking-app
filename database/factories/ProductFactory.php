<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'type' => $faker->randomElement(['Excursions', 'Cruises', 'Transfers']),
        'description' => $faker->text,
        'capacity' => $faker->randomNumber(2, false),
    ];
});
