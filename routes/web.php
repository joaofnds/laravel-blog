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
        Route::get('/create', 'PostsController@create')
            ->name('post.create');

        Route::post('/store', 'PostsController@store')
            ->name('post.store');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoriesController@index')
            ->name('category');

        Route::get('/create', 'CategoriesController@create')
            ->name('category.create');

        Route::post('/store', 'CategoriesController@store')
            ->name('category.store');
    });

});