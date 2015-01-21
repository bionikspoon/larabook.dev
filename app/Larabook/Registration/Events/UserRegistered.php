<?php namespace Larabook\Registration\Events;

use Larabook\Users\User;

/**
 * Class UserRegistered
 *
 * @package Larabook\Registration\Events
 */
class UserRegistered
{

    public $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
