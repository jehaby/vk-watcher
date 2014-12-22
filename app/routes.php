<?php

use Carbon\Carbon;


Route::get('/', 'PersonController@index');

Route::get('p/all', ['as' => 'all', 'uses' => 'PersonController@allPersons']);
Route::resource('p', 'PersonController');

Route::resource('login', 'LoginController', ['only' => ['index', 'store']]);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);


Route::get('p/json/{id}', 'PersonController@toJson');
Route::get('p/json-day/{id}/{day}', 'PersonController@toJsonDay');
Route::get('p/json-days/{id}/{start_day}/{end_day}', 'PersonController@toJsonDays');


Route::get('u/register', 'UserController@getRegister');
Route::post('u/register', 'UserController@postRegister');
Route::get('u', 'UserController@index');
//Route::post('u/')


Route::get('t', function()
{
    $start_time = microtime(true);
    return Visit::all()->count() . 'finish in ' . (microtime(true) - $start_time);
});

Route::get('test-pure', function()
{
   return View::make('pure');
});