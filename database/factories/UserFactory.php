<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$Xxbjsdzw8Eu51x81Vyl9gOaXauZo/xWQ4Mu7j9cbKnYu2ZkGEZYa6', // password
        'phone' => rand(100, 99999999),
        'terms_accepted' => rand(0, 1) ? $faker->dateTime($max = 'now', $timezone =  'Europe/Bucharest') : null,
    ];
});
