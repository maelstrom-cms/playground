<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Hints & Tips', 'colour' => '#4597ec'],
            ['name' => 'Tutorials', 'colour' => '#f29b38'],
            ['name' => 'Rants', 'colour' => '#e25141'],
            ['name' => 'News & Updates', 'colour' => '#97c05c'],
            ['name' => 'Funny', 'colour' => '#6042b0'],
            ['name' => 'Other', 'colour' => '#657c89'],
        ]);
    }
}
