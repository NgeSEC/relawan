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
Route::get('/about-us', 'HomeController@about')->name('about-us');
Route::get('/daftar-posko', 'HomeController@posko')->name('daftar-posko');
Route::get('/detail-posko/{slug}', 'HomeController@detail')->name('detail-posko');
Route::get('/search/{terms}', 'HomeController@search')->name('search');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/terms-and-conditions', 'HomeController@trc')->name('trc');
Route::get('/privacy-policy', 'HomeController@privacypolicy')->name('privacy-policy');
Route::match(array('GET', 'POST'), '/contact-us', 'HomeController@contact')->name('contact');

Route::name('references.')->middleware('auth')->prefix('references')->group(function(){
    Route::name('place.')->prefix('place')->group(function(){
        Route::post('/save-bulk','References\PlaceController@store')->name('bulk');
        Route::get('/save-bulk','References\PlaceController@store')->name('bulk');
    });
});

