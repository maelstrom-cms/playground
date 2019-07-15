<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'name' => $faker->words($faker->numberBetween(1, 5), true),
        'items' => [],
    ];
});
