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

Route::get('/', 'FoodController@index')->name('food');

//AJAX
Route::post('/search/food', 'FoodController@ajaxSearchFood')->name('ajax.search.food');
Route::post('/save/food', 'FoodController@saveFood')->name('ajax.save.food');
Route::post('/update/food', 'FoodController@updateFood')->name('ajax.update.food');
