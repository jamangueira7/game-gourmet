<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'value' => $faker->lastName(),
    ];
});
