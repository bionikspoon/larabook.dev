<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;

/**
 * Class UnfollowUserCommandHandler
 *
 * @package Larabook\Users
 */
class UnfollowUserCommandHandler implements CommandHandler
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
     * Handle the command.
     *
     * @param object $command
     *
     * @return void
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);
        $this->userRepo->unfollow($command->userIdToUnfollow, $user);
    }
}
