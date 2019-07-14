<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$avatarFolder = \Illuminate\Support\Facades\Storage::disk('avatars')->getAdapter()->getPathPrefix();

$factory->define(\App\Author::class, function (Faker $faker) use ($avatarFolder) {
    $avatar = $faker->image(rtrim($avatarFolder, '/'), 300, 300);
    $avatar = pathinfo($avatar);

    return [
        'name' => $faker->name,
        'website' => $faker->url,
        'biography' => implode('', array_map(function ($line) {
            return sprintf('<p>%s</p>', $line);
        }, $faker->paragraphs(3))),
        'avatar' => $avatar['basename'],
    ];
});
