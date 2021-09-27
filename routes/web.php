<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('search', 'SearchController@post')->name('search.posts');
Route::prefix('post')->middleware('auth')->group(function(){
    Route::get('create', 'PostController@create')->name('posts.create');
    Route::patch('store', 'PostController@store')->name('posts.store');
    Route::get('edit/{post:slug}', 'PostController@edit')->name('posts.edit');
    Route::patch('update/{post:slug}', 'PostController@update');
    Route::delete('delete/{post}', 'PostController@destroy');
});
Route::get('post', 'PostController@index')->name('posts.index');
Route::get('post/{post:slug}', 'PostController@show')->name('posts.show');


Route::get('categories/{category:slug}', 'CategoryController@show')->name('categories.show');
Route::get('tags/{tag:slug}', 'TagController@show')->name('tags.show');

// Bagian home
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
