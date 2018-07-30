<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Album::class, function (Faker\Generator $faker) {
    return [
        'idx' => $faker->unique()->numberBetween($min = 1, $max = 50),
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});
