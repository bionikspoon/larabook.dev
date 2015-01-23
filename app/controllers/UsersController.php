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
}