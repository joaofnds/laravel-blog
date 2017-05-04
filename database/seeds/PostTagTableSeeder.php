<?php

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = App\Post::all();

        $posts[0]->tags()->sync([1,2,8]);
        $posts[1]->tags()->sync([2,3]);
        $posts[2]->tags()->sync([4,5]);
        $posts[3]->tags()->sync([6,7]);
    }
}
