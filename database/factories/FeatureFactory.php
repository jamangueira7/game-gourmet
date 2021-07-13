<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\Feature;
use Faker\Generator as Faker;

$factory->define(Feature::class, function (Faker $faker) {
    return [
        'value' => $faker->lastName(),
        'food_id' => 1
    ];
});
