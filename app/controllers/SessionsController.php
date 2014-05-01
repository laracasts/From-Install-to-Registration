<?php

use Acme\Forms\LoginForm;

class SessionsController extends BaseController {

	/**
	 * @var Acme\Forms\LoginForm
	 */
	protected $loginForm;

	/**
	 * @param LoginForm $loginForm
	 */
	function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->loginForm->validate($input = Input::only('email', 'password'));

		if (Auth::attempt($input))
		{
			return Redirect::intended('/');
		}

		return Redirect::back()->withInput()->withFlashMessage('Invalid credentials provided');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();

		return Redirect::home();
	}

}
