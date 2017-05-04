<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $categories = Category::take(4)->get();
        $posts_by_date = Post::query()->orderBy('created_at', 'desc');
        $posts = $posts_by_date
            ->take(3)
            ->get();

        return view('index', [
            'title' => $settings->site_name,
            'categories' => $categories,
            'first_post' => $posts[0],
            'second_post' => $posts[1],
            'third_post' => $posts[2],
            'settings' => $settings
        ]);
    }

    public function single($slug)
    {
        $settings = Setting::first();
        $categories = Category::take(4)->get();
        $post = Post::where('slug', $slug)->first();
        $next_post_id = Post::where('id', '>', $post->id)->min('id');
        $previous_post_id = Post::where('id', '<', $post->id)->max('id');
        $author = $post->user;

        return view('single', [
            'title' => $post->title,
            'categories' => $categories,
            'settings' => $settings,
            'post' => $post,
            'author' => $author,
            'next_post' => Post::find($next_post_id),
            'previous_post' => Post::find($previous_post_id)
        ]);
    }

    public function category($id)
    {
        $category = Category::find($id);
        $settings = Setting::first();
        $categories = Category::take(4)->get();
        $tags = Tag::all();

        return view('category', [
            'category' => $category,
            'title' => $category->name,
            'categories' => $categories,
            'tags' => $tags,
            'settings' => $settings
        ]);
    }
    public function tag($id)
    {
        $tag = Tag::find($id);
        $tags = Tag::all();
        $settings = Setting::first();
        $categories = Category::take(4)->get();
        $categories_all = Category::all();

        return view('tag', [
            'tag' => $tag,
            'title' => $tag->tag,
            'categories' => $categories,
            'tags' => $tags,
            'settings' => $settings
        ]);
    }
}
