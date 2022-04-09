<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//роуты для админа
Route::middleware(['role:admin'])->group( function() {
    Route::get('/admin',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');
    Route::resource('category',\App\Http\Controllers\Admin\CategoryController::class);
});
//->prefix('admin')
