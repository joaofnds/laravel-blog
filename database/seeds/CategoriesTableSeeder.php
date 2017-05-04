<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create(['name' => 'life']);
        App\Category::create(['name' => 'programing']);
        App\Category::create(['name' => 'general']);
        App\Category::create(['name' => 'cars']);
        App\Category::create(['name' => 'dance']);
    }
}
