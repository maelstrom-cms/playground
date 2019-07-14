<?php

/* @var $factory Factory */

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Storage;
use Maelstrom\Models\Media;
use Faker\Generator as Faker;

$imageFolder = Storage::disk('public')->getAdapter()->getPathPrefix();

$factory->define(Media::class, function (Faker $faker) use ($imageFolder) {
    $image = $faker->image(rtrim($imageFolder, '/'), 1000, 1000);
    $image = pathinfo($image)['basename'];

    return [
        'name' => $faker->words(5, true),
        'path' => $image,
        'thumbnail_path' => $image,
        'type' => 'image/jpeg',
        'size' => $faker->numberBetween(100, 2000),
        'alt' => $faker->sentence,
        'dimensions' => sprintf('%dx%d', $faker->numberBetween(200, 2000), $faker->numberBetween(200, 2000)),
        'cached_url' => Storage::url($image),
        'cached_thumbnail_url' => Storage::url($image),
        'description' => $faker->sentence,
        'tags' => $faker->words($faker->numberBetween(0, 3)),
    ];
});
