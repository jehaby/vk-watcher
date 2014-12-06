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

    $vk_response = file_get_contents("https://api.vk.com/method/users.get?user_ids={$ids_string}&fields=online");
    $res = json_decode($vk_response);

    foreach($res->response as $person) {

        $last_check_online = $persons[$person->uid];  // getPersonWithThisID

        // There will be bug if server go offline or VK ban us!
        //  it can be solved with task which checks when was the last sucessfull request to vk api

        if ($person->online && !$last_check_online) {  // person appears online
            Visit::create(['person_id' => $person->uid]);
            Person::find($person->uid)->update(['last_check_online' => true]);  // how many queries?
        }

        if (!$person->online && $last_check_online) { // person go offline
            Visit::wherePersonId($person->uid)->orderBy('created_at', 'desc')->first()->touch();
            Person::find($person->uid)->update(['last_check_online' => false]);
        }
    }

});


Route::get('test-off', function()
{

    d(Visit::wherePersonId('2232736')->orderBy('created_at', 'desc')->first()->touch());
    return;

    $persons = Person::whereLastCheckOnline(1);

    d($persons);

    foreach($persons->get() as $person) {
        d($person);

        $person->last_check_online = false;
        $person->save();

        Visit::where('person_id', '=', $person->id)->latest()->update([]);
    }

});


Route::get('t2', function() {

       $user = User::create([
        'username' => 'u',
        'email' => 'kevin.smth.42@gmail.com',
        'password' => Hash::make('ffffff'),
    ]);

});