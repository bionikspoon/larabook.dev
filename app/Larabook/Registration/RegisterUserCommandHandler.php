<?php namespace Larabook\Registration;

use Larabook\Users\User;
use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

/**
 * Class RegisterUserCommandHandler
 *
 * @package Larabook\Registration
 */
class RegisterUserCommandHandler implements CommandHandler
{
    use DispatchableTrait;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * Inject UserRepository
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command
     *
     * @param $command
     *
     * @return User|void
     */
    public function handle($command)
    {
        $user = User::register(
            $command->username,
            $command->email,
            $command->password
        );

        $this->repository->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }
}
