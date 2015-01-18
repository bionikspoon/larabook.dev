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
		return Redirect::home();
	}
}