<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tasks;
use Faker\Generator as Faker;

$factory->define(Tasks::class, function (Faker $faker) {
    return [
        'name' => $faker -> realText($maxNbChars = rand(5, 120), $indexSize = 2)
    ];
});
