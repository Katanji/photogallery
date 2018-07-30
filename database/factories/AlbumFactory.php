<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Album::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});
