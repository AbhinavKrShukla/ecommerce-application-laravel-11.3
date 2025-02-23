<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', function() {
    return view('admin.dashboard');
});
Route::get('/test', function() {
    return view('test');
});

Route::resource('category', 'App\Http\Controllers\CategoryController');

