<?php

use Larabook\Users\UserRepository;

/**
 * Class UsersController
 */
class UsersController extends \BaseController
{
    /**
     * @var \Larabook\Users\UserRepository
     */
    protected $userRepository;

    /**
     * @param \Larabook\Users\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of Users.
     * GET /users
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->getPaginated();

        return View::make('users.index')->withUsers($users);
    }

    /**
     * Create a view for a single user
     *
     * @param $username
     *
     * @return View
     */
    public function show($username)
    {
        $user = $this->userRepository->findByUsername($username);

        return View::make('users.show')->withUser($user);
    }
}
