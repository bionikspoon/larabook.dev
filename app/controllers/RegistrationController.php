<?php

use Larabook\Core\CommandBus;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Users\User;

/**
 * Class RegistrationController
 */
class RegistrationController extends \BaseController
{

    use CommandBus;


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
        $validator = User::validator(Input::all(), User::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        extract(Input::only('username', 'email', 'password'));


        /** @var string $username */
        /** @var string $email */
        /** @var string $password */
        $user = $this->execute(
            new RegisterUserCommand($username, $email, $password)
        );

        Auth::login($user);

        return Redirect::home();
    }
}
