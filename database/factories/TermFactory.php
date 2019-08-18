<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Term;
use Faker\Generator as Faker;

$factory->define(Term::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'content' => $faker->paragraph(rand(5, 10)),
        'published_at' => rand(0, 1) ? $faker->dateTime($max = 'now', $timezone =  'Europe/Bucharest') : null,
    ];
});
