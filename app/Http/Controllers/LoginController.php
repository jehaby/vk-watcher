<?php namespace VkWatcher\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller {


	protected $auth;


	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if ($this->auth->check()) return redirect()->route('all');

		return view('login');
	}

	public function logout()
	{
		$this->auth->logout();
		return redirect()->route('all');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = \Input::only('username', 'password');
		$remember = \Input::has('remember');

		if ($this->auth->attempt($credentials, $remember))
		{
//			$_SESSION['admin'] = \Auth::id();
			return redirect('p');
		}

		return redirect()->back()->withFlashMessage("Login failed!")->withFlashType('danger');
	}



}
