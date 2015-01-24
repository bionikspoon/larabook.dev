<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;

/**
 * Class FollowUserCommandHandler
 *
 * @package Larabook\Users
 */
class FollowUserCommandHandler implements CommandHandler
{
    /**
     * @var \Larabook\Users\UserRepository
     */
    protected $userRepo;

    /**
     * @param \Larabook\Users\UserRepository $userRepo
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Handle the command
     *
     * @param $command
     *
     * @return User
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->follow($command->userIdToFollow, $user);

         return $user;
    }
}
