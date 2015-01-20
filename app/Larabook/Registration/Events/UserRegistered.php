<?php namespace Larabook\Registration\Events;

use Larabook\Users\User;

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