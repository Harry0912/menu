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


Route::get('/', 'MenuController@index');
Route::get('/create', 'MenuController@create')->name('create');
Route::post('/create/store', 'MenuController@store')->name('store');
Route::get('/edit/{id}', 'MenuController@edit')->name('edit');
Route::patch('/update', 'MenuController@update')->name('update');
Route::delete('/delete/{id}', 'MenuController@destroy');