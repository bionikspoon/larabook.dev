<?php

use Larabook\Forms\SignInForm;

/**
 * Class SessionsController
 */
class SessionsController extends \BaseController
{
    /**
     * @var SignInForm
     */
    private $signInForm;

    /**
     * @param SignInForm $signInForm
     */
    public function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest', ['except' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     * GET /sessions
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /sessions/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /sessions
     *
     * @return Response
     */
    public function store()
    {
        // fetch the form input
        $input = Input::only('email', 'password');
        // validate the form
        $this->signInForm->validate($input);
        // if invalid go back
        // if valid, try to sign in
        if (!Auth::attempt($input)) {
            //Flash::message('We were unable to sign you in. Please check your credentials and try again!');

            return Redirect::back()->withInput()->withErrors('Username and password did not match');
        }

        // redirect to statuses
        Flash::message('Welcome back!');

        return Redirect::intended('statuses');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::logout();
        Flash::message('You have now been logged out.');

        return Redirect::home();
    }
}
