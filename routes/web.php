<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/blog-single', function () {
    return view('blog-single');
})->name('blog-single');

Route::get('/single-product', function () {
    return view('single-product');
})->name('single-product');
