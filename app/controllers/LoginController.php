<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login');
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

		if (\Auth::attempt($credentials, $remember))
		{
			$_SESSION['admin'] = \Auth::id();

			return $this->redirect('home')->withFlashMessage('Login Success!');
		}

		if (getenv('TESTING'))
		{
			return \Redirect::to('admin/login')->withFlashMessage("Login failed!")->withFlashType('danger');
		}

		return \Redirect::back()->withFlashMessage("Login failed!")->withFlashType('danger');
	}



}
