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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/about', function (){
    return view('pages.about');
});

Route::group(['middleware' => ['auth']], function() 
{
    Route::post('/form', 'FormsController@confirmData');
    
    Route::post('/confirm', 'FormsController@writeData');    

    Route::get('/form', function() {
        return view('pages.form');
    });

    Route::get('/confirm', function() {
        return view('pages.confirm');
    });

    Route::get('/confirm', 'FormsController@back');

    Route::get('/', function () {
        return view('home');
    });
});