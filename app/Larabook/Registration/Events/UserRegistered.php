<?php namespace Larabook\Registration\Events;

use Larabook\Users\User;

/**
 * Class UserRegistered Event
 *
 * @package Larabook\Registration\Events
 */
class UserRegistered
{

    /**
     * @var \Larabook\Users\User
     */
    public $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
