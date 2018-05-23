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

Route::get('/index', function () {
    return view('pages.index');
});

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/', function () {
    //return view('welcome');
    return 'Hello World';
});
*/

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/users/{id}', function ($id) {
    return 'Hello, '.$id;
});

Route::get('/form', function () {
    return view('pages.form');
});

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
