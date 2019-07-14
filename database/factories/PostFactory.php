<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $data = [
        'name' => $faker->sentence,
        'rating' => $faker->numberBetween(1, 5),
        'body' => implode('', array_map(function ($line) {
            return sprintf('<p>%s</p>', $line);
        }, $faker->paragraphs(10))),
        'is_featured' => $faker->boolean,
        'category_id' => $faker->numberBetween(1, 6),
        'author_id' => $faker->numberBetween(1, 10),
    ];

    if ($data['is_featured']) {
        $data['featured_headline'] = $faker->sentence;
        $data['featured_image'] = $faker->numberBetween(1, 20);
    }

    return $data;
});
