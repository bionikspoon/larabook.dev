<?php

use Larabook\Core\CommandBus;
use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Users\User;

/**
 * Class RegistrationController
 */
class RegistrationController extends \BaseController
{

    use CommandBus;
    /**
     * @var \Larabook\Forms\RegistrationForm
     */
    private $registrationForm;

    /**
     * Filter Guests
     *
     * @param \Larabook\Forms\RegistrationForm $registrationForm
     */
    public function __construct(RegistrationForm $registrationForm)
    {
        $this->beforeFilter('guest');
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

    /**
     * New User
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->registrationForm->validate(Input::all());

        extract(Input::only('username', 'email', 'password'));

        /** @var string $username */
        /** @var string $email */
        /** @var string $password */
        $user = $this->execute(
            new RegisterUserCommand($username, $email, $password)
        );

        Auth::login($user);

        Flash::message('Glad to have you as a new Larabook member');

        return Redirect::home();
    }
}
