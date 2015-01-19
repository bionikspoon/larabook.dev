<?php
use Larabook\Forms\RegistrationForm;
use Laracasts\Validation\FormValidationException;

class RegistrationController extends \BaseController {

	private $registrationForm;

	function __contruct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	}

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

		try {
			$this->registrationForm->validate($input);
		} catch (FormValidationException $e) {
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

		$user = User::create(
				Input::only('username','email', 'password')
			);

		Auth::login($user);

		return Redirect::home();
	}
}