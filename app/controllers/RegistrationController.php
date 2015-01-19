<?php

class RegistrationController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 * GET /registration/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, User::$rules);


		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user = User::create(
				Input::only('username','email', 'password')
			);

		Auth::login($user);

		return Redirect::home();
	}
}