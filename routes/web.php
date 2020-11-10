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
});

Route::get('/home','adminController@index');
// Route::get('/{anypath}','adminController@index')->where('path','.*');

Route::get('/post','PostController@all_post');
Route::get('/editpost/{id}','PostController@edit_post');
Route::get('/post/{id}','PostController@delete_post');
Route::post('/add-post','PostController@add_post');
Route::post('/update-post/{id}','PostController@update_post');

//category

Route::post('/add-category','CategoryController@add_category');
Route::get('/category','CategoryController@all_category');
Route::get('/editcategory/{id}','CategoryController@edit_category');
Route::post('/update-category/{id}','CategoryController@update_category');
Route::get('/category/{id}','CategoryController@delete_category');

