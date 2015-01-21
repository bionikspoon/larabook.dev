<?php namespace Larabook\Statuses;

use Larabook\Users\User;

/**
 * Class StatusRepository
 *
 * @package Larabook\Statuses
 */
class StatusRepository
{
    /**
     * @param \Larabook\Statuses\Status $status
     * @param                           $userId
     *
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        return User::find($userId)
            ->statuses()
            ->save($status);
    }

    /**
     * @param \Larabook\Users\User $user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getAllForUser(User $user)
    {
        return $user->statuses()->get();
    }
}



