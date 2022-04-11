<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();



Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home'); // /admin
Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
Route::resource('post', App\Http\Controllers\Admin\PostController::class);
//Route::get('category/{$id}', 'CategoryController@show')->name('single.category');


//Route::get('/article/{slug}', 'PostController@show')->name('posts.single');
//Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');
