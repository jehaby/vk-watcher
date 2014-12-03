<?php

class PersonController extends \BaseController {


	public function __construct()
	{
		$this->beforeFilter('auth', ['except' => ['allPersons', 'show']]);
	}


	public function allPersons()
	{
		return View::make('persons.index')->withPersons(Person::all());
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
		if (Auth::guest()) {
			return Redirect::action('PersonController@allPersons');
		}

		$persons = Auth::user()->persons()->get();

		return View::make('persons.index')->withPersons($persons);
	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// first check if user exists in db
		// check if we can find him on vk
		//

		return View::make('persons.create');
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// should work well with all input types: http[s]://[m].vk.com/id666|shortAdress, http[s]://vk.com... , id8374598, 75493749375, short_adress ...

		$vk_id = $this->checkID(Input::get('person_data'));

		$person = Person::create(['id' => $vk_id]);

		Auth::user()->persons()->attach($person->id);

		return Redirect::action('PersonController@index');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$person = Person::findOrFail($id);

		return View::make('persons.show')->withPerson($person);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'wtfwtf';
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}

	public function __call($method, $pars)
	{
		return 'wtf __call()';
	}

	private function checkID($input)
	{
		// should clear, check database, check vk

		return $input;
	}
}
