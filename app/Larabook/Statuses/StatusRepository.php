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
     * Saves status to user
     *
     * @param \Larabook\Statuses\Status $status
     * @param integer                   $userId
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
     * Gets all statuses that belong to user, one to many
     *
     * @param \Larabook\Users\User $user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getAllForUser(User $user)
    {
        return $user->statuses()->with('user')->latest()->get();
    }

    /**
     * Get the feed for a user.
     *
     * @param \Larabook\Users\User $user
     *
     * @return Status[]
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->follows()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();
    }
}
