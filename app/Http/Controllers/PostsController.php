<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')
            ->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if ($categories->count() === 0) {
            return redirect()->back();
        }

        return view('admin.posts.create')
            ->with('categories', $categories)
            ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = hash_file('sha256', $featured) . '.' . $featured->guessExtension();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'slug' => str_slug($request->title)
        ]);

        return redirect()->route('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')
            ->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = hash_file('sha256', $featured) . '.' . $featured->guessExtension();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);

        $post->tags()->sync($request->tags);

        $post->save();

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->first();

        $post->forceDelete();

        return redirect()->route('post.trashed');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()
            ->where('id', $id)
            ->first();

        $post->restore();

        return redirect()->route('post');
    }

    public function trash($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('post');
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')
            ->with('posts', $posts);
    }
}
