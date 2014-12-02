<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//
//Route::get('/', function()
//{
//	return 111;
//	return View::make('hello');
//});
//
//
//Route::group(['admin'], function()
//{
//
//
//});


Route::group(['before' => 'auth'], function()  // why not work??
{
    Route::get('p/create', 'PersonController@create');
    Route::post('p', 'PersonController@store');
    Route::get('p/{p}/edit', 'PersonController@edit');
});

Route::get('p/all', ['as' => 'all', 'uses' => 'PersonController@allPersons']);
Route::resource('p', 'PersonController');

Route::resource('login', 'LoginController', ['only' => ['index', 'store']]);
