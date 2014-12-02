<?php

class PersonController extends \BaseController {


	public function allPersons()
	{

		return 'wtf';
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
			Redirect::action('PersonController@allPersons');
		}

		$persons = Person::all() ;

		return View::make('persons.index')->withPersons($persons);

		//
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




		//
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$vk_id = $this->getIDFromInput(Input::get('person_data'));

		$person = Person::create(['id' => $vk_id]);

//		User::find(Auth::user()->id)-
		Auth::user()->persons()->attach($person->id);

		d(Auth::user());
		// should work well with all input types: http[s]://[m].vk.com/id666|shortAdress, http[s]://vk.com... , id8374598, 75493749375, short_adress ...

		return d(Input::all());


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'shows details of person with id == ' . $id ;
		//
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
		//
	}

	public function __call($method, $pars)
	{
		return 'wtf __call()';
	}

	private function getIDFromInput($input)
	{
		return $input;
	}
}
