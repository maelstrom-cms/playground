<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
            ['name' => 'html'],
            ['name' => 'css'],
            ['name' => 'php'],
            ['name' => 'javascript'],
            ['name' => 'react'],
            ['name' => 'laravel'],
            ['name' => 'ant-design'],
            ['name' => 'tailwindcss'],
            ['name' => 'maelstrom'],
        ]);
    }
}
