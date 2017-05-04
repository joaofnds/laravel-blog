<?php

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
        App\Tag::create(['tag' => 'cat']);
        App\Tag::create(['tag' => 'dog']);
        App\Tag::create(['tag' => 'keyboard']);
        App\Tag::create(['tag' => 'bike']);
        App\Tag::create(['tag' => 'skate']);
        App\Tag::create(['tag' => 'controversial']);
        App\Tag::create(['tag' => 'world']);
        App\Tag::create(['tag' => 'fun']);
    }
}
