<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/posko', 'PoskoController@index')->name('posko.list.json');
Route::get('/city/province_id/{province_id}', 'References\CityController@index')->name('city.list.json');
Route::get('/district/city_id/{city_id}', 'References\DistrictController@index')->name('districts.list.json');
Route::get('/village/district_id/{district_id}', 'References\VillageController@index')->name('villages.list.json');