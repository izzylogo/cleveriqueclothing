<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'ZTTW',
            'slug' => 'ZTTW'
        ]);
        Brand::create([
            'name' => 'Others',
            'slug' => 'others'
        ]);
        Brand::create([
            'name' => 'Gucci',
            'slug' => 'gucci'
        ]);
        Brand::create([
            'name' => 'Prada',
            'slug' => 'prada'
        ]);
        Brand::create([
            'name' => 'Louis Vuitton',
            'slug' => 'louis-vuitton'
        ]);
        Brand::create([
            'name' => 'Chanel',
            'slug' => 'chanel'
        ]);
        Brand::create([
            'name' => 'Dior',
            'slug' => 'dior'
        ]);
        Brand::create([
            'name' => 'Versace',
            'slug' => 'versace'
        ]);
        Brand::create([
            'name' => 'Balenciaga',
            'slug' => 'balenciaga'
        ]);
        Brand::create([
            'name' => 'Fendi',
            'slug' => 'fendi'
        ]);
        Brand::create([
            'name' => 'Givenchy',
            'slug' => 'givenchy'
        ]);
        Brand::create([
            'name' => 'Armani',
            'slug' => 'armani'
        ]);
        Brand::create([
            'name' => 'Celine',
            'slug' => 'celine'
        ]);
        
    }
}
