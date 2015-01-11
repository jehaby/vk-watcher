<?php  namespace VkWatcher\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;
use VkWatcher\Person;
use VkWatcher\Visit;

class PersonController extends Controller {


	protected $auth;


	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
		$this->beforeFilter('auth', ['except' => ['allPersons', 'show', 'toJson', 'toJsonDay', 'toJsonDays']]);
	}


	public function allPersons()
	{
//		return view('persons.index')->withPersons([]);
		return view('persons.index')->withPersons(Person::all());
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
		if ($this->auth->guest()) {
			return redirect('p/all');
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

		return View::make('persons.create')->withMessage(Session::get('message'));
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// should work well with all input types: http[s]://[m].vk.com/id666|shortAdress, http[s]://vk.com... , id8374598, 75493749375, short_adress ...

		return $this->checkIdAndStorePerson(Input::get('person_data'));

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

		$visits = Visit::lastWeek($id);

		$visits = Visit::lastNDays($id, 30);

		d($visits->get()->toArray());

		return view('persons.show')->withPerson($person)->withVisits($visits);
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

	private function checkIdAndStorePerson($input)
	{

		// should clear, check database, check vk

		$vk_response = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$input}&fields=domain"));

		if (property_exists($vk_response, 'error')) {
			return Redirect::to('p/create')->withMessage('Try to enter other id');
		}

		$new_person = $vk_response->response[0];
		$person = Person::find($new_person->uid);

		if ($person) {
			if (Auth::user()->persons()->get()->find($person->id)) {
				return Redirect::to('p/create')->withMessage('You already watching this person');
			}
		}
		else {
			$person = Person::create([
				'id' => $new_person->uid,
				'first_name' => $new_person->first_name,
				'last_name' => $new_person->last_name,
				'domain' => $new_person->domain,
			]);
		}

		Auth::user()->persons()->attach($person->id);

		return Redirect::to('p');
	}


	public function toJson($id) {

		return json_encode(Person::find($id)->visits()->get());

	}


	public function toJsonDay($id, $day)
	{

		return $this->toJsonDays($id, $day, Carbon::createFromFormat('Y-m-d H', $day . ' 00')->addDay()->toDateString());

	}


	public function toJsonDays($id, $start_day, $end_day)
	{

		return Visit::wherePersonId($id)->whereBetween('online', [
			Carbon::createFromFormat('Y-m-d H', $start_day . ' 00'),
			Carbon::createFromFormat('Y-m-d H', $end_day . ' 00'),
		])->get()->toJson();

	}


}

