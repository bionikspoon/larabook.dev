<?php

use Larabook\Forms\SignInForm;
use Laracasts\Validation\FormValidationException;

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
    /** @noinspection PhpInconsistentReturnPointsInspection */
    public function store()
    {
        // fetch the form input
        $input = Input::only('email', 'password');
        // validate the form
        try {
            $this->signInForm->validate($input);
        } catch (FormValidationException $exception) {
            return Redirect::back()->withErrors($exception->getErrors())->withInput();
        }
        // if invalid go back
        // if valid, try to sign in
        if (Auth::attempt($input)) {
            // redirect to statuses
            Flash::message('Welcome back!');

            return Redirect::intended('/statuses');
        }
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
