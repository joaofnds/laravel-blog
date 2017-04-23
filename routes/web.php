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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'PostsController@index')
            ->name('post');

        Route::get('/create', 'PostsController@create')
            ->name('post.create');

        Route::post('/store', 'PostsController@store')
            ->name('post.store');

        Route::get('/edit/{id}', 'PostsController@edit')
            ->name('post.edit');

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

});