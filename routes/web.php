<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::resource('post', 'App\Http\Controllers\UserPostController@index');
//Route::get('category', 'App\Http\Controllers\UserPostController@category');
Auth::routes();

Route::group(['middleware'=>['role:admin']],function () {
    Route::get('home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin'); // /admin
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('post', App\Http\Controllers\Admin\PostController::class);
});


/*Route::group(['middleware' => 'role:user'], function () {
   // Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('homeUser');
    Route::resource('post', App\Http\Controllers\PostController::class);
    Route::resource('category', App\Http\Controllers\CategoryController::class);

});*/
