<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserTerm;
use Faker\Generator as Faker;

$factory->define(UserTerm::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return \App\User::all()->random()->id;
        },

        'term_id' => function() {
        return \App\Term::all()->random()->id;
        },
    ];
});
