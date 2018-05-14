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
})->middleware('cookie');

Auth::routes();

Route::get('ajax', 'AjaxController@getNews');
Route::get('home', 'HomeController@index')->name('home');

Route::get('{url}', 'CountryController@getIndex')->where('url', '[A-Za-z]{2}');
Route::get('city/{url}', 'CityController@getIndex');
Route::get('{url}/{name}', 'CountryController@getName')->where('url', '[A-Za-z]{3}')->middleware('cookie');
