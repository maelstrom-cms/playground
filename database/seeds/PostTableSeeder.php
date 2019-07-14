<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(Post::class, 20)->create()->each(function (Post $post) use ($faker) {
            $numberOfTags = $faker->numberBetween(0, 3);
            $tags = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            shuffle($tags);

            $post->tags()->sync(array_slice($tags, 0, $numberOfTags));
        });
    }
}
