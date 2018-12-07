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

Route::get('/posko', 'PlaceController@index')->name('daftar-posko');
Route::get('/posko/{slug}', 'PlaceController@detail')->name('detail-posko');

Route::post('/search', 'HomeController@search')->name('search');
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

Route::get('/admin','HomeController@admin')->middleware('auth');
Route::get('/admin/posko', 'AdminController@posko')->middleware('auth');
Route::get('/admin/posko/add', 'AdminController@addPosko')->middleware('auth');
Route::post('/admin/posko/add', 'AdminController@savePosko')->middleware('auth');
Route::get('/admin/posko/import', 'AdminController@importGeoJson')->middleware('auth');
Route::post('/admin/posko/import', 'AdminController@doImportGeoJson')->middleware('auth');

Route::get('/api/regencies', 'AdminController@getRegencies')->middleware('auth');
Route::get('/api/districts', 'AdminController@getDistricts')->middleware('auth');
Route::get('/api/villages', 'AdminController@getVillages')->middleware('auth');

