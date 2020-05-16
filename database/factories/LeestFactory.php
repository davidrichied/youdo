<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Leest;
use Faker\Generator as Faker;

$factory->define(Leest::class, function (Faker $faker) {
    return [
        'title' => $faker->realText('50'),
    ];
});
