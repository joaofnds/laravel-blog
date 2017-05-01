<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;

class FrontEndController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $categories = Category::take(4)->get();
        $first_post = Post::query()->orderBy('created_at', 'desc')->first();

        return view('index', [
            'title' => $settings->site_name,
            'categories' => $categories,
            'post' => $first_post
        ]);
    }
}
