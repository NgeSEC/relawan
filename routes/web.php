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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('references.')->middleware('auth')->prefix('references')->group(function(){
    Route::name('place.')->prefix('place')->group(function(){
        Route::post('/save-bulk','References\PlaceController@store')->name('bulk');
        Route::get('/save-bulk','References\PlaceController@store')->name('bulk');
    });
});

