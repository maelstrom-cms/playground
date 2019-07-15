<?php

use App\Gallery;
use Maelstrom\Models\Media;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        factory(Media::class, 20)->create();

        factory(Gallery::class, 5)->make()->each(function (Gallery $gallery) use ($faker) {
            $items = [];

            foreach (range(1, $faker->numberBetween(1, 3)) as $i) {
                $items[] = [
                    'title' => $faker->words($faker->numberBetween(1, 5), true),
                    'subtitle' => $faker->sentence,
                    'show_button' => $faker->boolean,
                    'button_url' => $faker->url,
                    'button_text' => $faker->word,
                    'image' => $faker->numberBetween(1, 20),
                ];
            }

            $gallery->items = $items;
            $gallery->save();
        });
    }
}
