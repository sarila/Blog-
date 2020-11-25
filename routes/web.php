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

//CRUD POST
Route::view('post', 'front/post');
Route::get('/post', 'PostController@index');
Route::post('/addpost', 'PostController@store')->name('post.add');
Route::get('/post/{id}', 'PostController@edit')->name('post.edit');

//CRUD Category
Route::get('/category', 'CategoryController@index');
Route::post('/addcategory', 'CategoryController@store')->name('category.add');
Route::get('/categories/{id}', 'CategoryController@edit')->name('category.edit');
Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
//delete Category
Route::delete('/category/{id}', 'CategoryController@destroy');
