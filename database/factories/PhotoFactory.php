<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Photo::class, function (Faker\Generator $faker) {
    return [
        'order' => $faker->randomDigit,
        'name' => $faker->word,
        'file' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
