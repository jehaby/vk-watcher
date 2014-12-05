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


//Route::group(['before' => 'auth'], function()  // why not work??
//{
//    Route::get('p/create', 'PersonController@create');
//    Route::post('p', 'PersonController@store');
//    Route::get('p/{p}/edit', 'PersonController@edit');
//});

Route::get('/', 'PersonController@index');

Route::get('p/all', ['as' => 'all', 'uses' => 'PersonController@allPersons']);
Route::resource('p', 'PersonController');

Route::resource('login', 'LoginController', ['only' => ['index', 'store']]);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);



Route::get('test', function()
{

    $persons = Person::lists('last_check_online', 'id');
    $ids_string = implode(',', array_keys($persons));

    $res = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$ids_string}&fields=online"));

    d($res);

//    return;

    foreach($res->response as $p) {

        $last_check_online = $persons[$p->uid];  // getPersonWithThisID

        // There will be bug if server go offline or VK ban us!
        //  it can be solved with task which checks when was the last sucessfull request to vk api


        if ($p->online && !$last_check_online) {  // person appears online
            Visit::create(['person_id' => $p->uid]);

            $person = Person::find($p->uid);
            $person->last_check_online = true;
            $person->save();
        }

        if (!$p->online && $last_check_online) { // person go offline
            $visit = Visit::where('person_id', '=', $p->uid)->latest();
            $visit->update([]);


            $person = Person::find($p->uid);
            $person->last_check_online = false;
            $person->save();

        }

    }

});


Route::get('test-off', function()
{

    $visit = Visit::where('person_id', '=', 18669287)->latest();
    $visit->update([]);

    d($visit);

    $person = Person::find(18669287);
    $person->last_check_online = false;
    $person->save();

    d($person);

});
