<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Core\Number;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName ,
        'email' => $faker->unique()->safeEmail,
        'passport_num' => $faker->randomNumber(9, false),
        'gender' => $faker->randomElement(['male', 'female']),
    ];
});
