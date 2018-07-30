<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'idx' => $faker->unique()->numberBetween(1, 100),
        'name' => $faker->word,
        'file' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
