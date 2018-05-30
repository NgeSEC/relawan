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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::name('references.')->middleware('auth')->prefix('references')->group(function(){
    Route::name('posko.')->prefix('posko')->group(function(){
        Route::post('/save-bulk','References\PoskoController@store')->name('bulk');
        Route::get('/save-bulk','References\PoskoController@store')->name('bulk');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
