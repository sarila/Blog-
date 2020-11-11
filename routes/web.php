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
    return view('index');
});
// Route::resource('/categorys', 'CategoryController');
// Route::post('/category', 'CategoryController@store');
Route::view('layout', 'layout');
Route::view('hi', 'Hi');
Route::view('post', 'front/post');
Route::view('categorys', 'category');

