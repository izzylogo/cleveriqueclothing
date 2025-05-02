<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Jeweries',
            'slug'=>'jeweries'
        ]);
        Category::create([
            'name' => 'Shirt',
            'slug'=>'shirt'
        ]);
        Category::create([
            'name' => 'Hoodie',
            'slug'=>'hoodie'
        ]);
        Category::create([
            'name' => 'Trousers',
            'slug'=>'trousers'
        ]);
        Category::create([
            'name' => 'Shorts',
            'slug'=>'shorts'
        ]);
        Category::create([
            'name' => 'Hats/Cap',
            'slug'=>'hats/cap'
        ]);
        Category::create([
            'name' => 'Watch',
            'slug'=>'watch'
        ]);
        Category::create([
            'name' => 'Others',
            'slug'=>'others'
        ]);
        Category::create([
            'name' => 'Shoe',
            'slug'=>'shoe'
        ]);
    }
}
