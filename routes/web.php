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

Route::get('/', 'EventController@index');
Route::get('/events/create', 'EventController@create');
Route::post('/events', 'EventController@store');
Route::get('/events/{id}', 'EventController@show');
Route::get('/events/{id}/edit', 'EventController@edit');
Route::put('/events/{id}', 'EventController@update');
Route::delete('/events/{id}', 'EventController@destroy');