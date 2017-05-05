<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontEndController@index')
    ->name('index');

Route::get('/post/{slug}', 'FrontEndController@single')
    ->name('post.single');

Auth::routes();

Route::get('/category/{id}', 'FrontEndController@category')
    ->name('category.single');

Route::get('/tag/{id}', 'FrontEndController@tag')
    ->name('tag.single');

Route::get('/results', function() {
    $query = request('query');
    $posts = \App\Post::where('title', 'like', "%$query%")->get();
    $settings = \App\Setting::first();
    $categories = \App\Category::take(5)->get();
    $tags = \App\Tag::all();

    return view('results')
        ->with('posts', $posts)
        ->with('title', "Search: $query")
        ->with('settings', $settings)
        ->with('categories', $categories)
        ->with('tags', $tags);

})->name('results');

Route::post('/subscribe', function() {
    $email = request('email');

    Newsletter::subscribe($email);

    return redirect()->back();
})->name('subscribe');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    Route::get('/dashboard', 'HomeController@index')
        ->name('dashboard');

    Route::group(['prefix' => 'settings'], function() {
       Route::get('/', 'SettingsController@index')
           ->name('settings');

       Route::post('/settings/update', 'SettingsController@update')
           ->name('settings.update');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'PostsController@index')
            ->name('post');

        Route::get('/create', 'PostsController@create')
            ->name('post.create');

        Route::post('/store', 'PostsController@store')
            ->name('post.store');

        Route::get('/edit/{id}', 'PostsController@edit')
            ->name('post.edit');

        Route::post('/update/{id}', 'PostsController@update')
            ->name('post.update');

        Route::get('/trash/{id}', 'PostsController@trash')
            ->name('post.trash');

        Route::get('/restore/{id}', 'PostsController@restore')
            ->name('post.restore');

        Route::get('/trashed', 'PostsController@trashed')
            ->name('post.trashed');

        Route::get('/destroy/{id}', 'PostsController@destroy')
            ->name('post.destroy');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoriesController@index')
            ->name('category');

        Route::get('/create', 'CategoriesController@create')
            ->name('category.create');

        Route::post('/store', 'CategoriesController@store')
            ->name('category.store');

        Route::post('/category/update/{id}', 'CategoriesController@update')
            ->name('category.update');

        Route::get('/category/edit/{id}', 'CategoriesController@edit')
            ->name('category.edit');

        Route::get('/category/destroy/{id}', 'CategoriesController@destroy')
            ->name('category.destroy');
    });

    Route::group(['prefix' => 'tag'], function() {

       Route::get('/', 'TagsController@index')
           ->name('tag');

       Route::get('/create', 'TagsController@create')
           ->name('tag.create');

       Route::post('/store', 'TagsController@store')
           ->name('tag.store');

       Route::post('/tag/update/{id}', 'TagsController@update')
           ->name('tag.update');

       Route::get('/tag/edit/{id}', 'TagsController@edit')
           ->name('tag.edit');

       Route::get('/tag/destroy/{id}', 'TagsController@destroy')
           ->name('tag.destroy');

    });

    Route::group(['prefix' => 'user'], function () {

        Route::get('/', 'UsersController@index')
            ->name('user');

        Route::get('/create', 'UsersController@create')
            ->name('user.create');

        Route::get('/destroy/{id}', 'UsersController@destroy')
            ->name('user.destroy');

        Route::post('/store', 'UsersController@store')
            ->name('user.store');

        Route::get('/admin/{id}', 'UsersController@toggleAdmin')
            ->name('user.toggleAdmin');

        Route::get('/profile', 'ProfilesController@index')
            ->name('user.profile');

        Route::post('/profile/{id}', 'ProfilesController@update')
            ->name('user.profile.update');

    });

});