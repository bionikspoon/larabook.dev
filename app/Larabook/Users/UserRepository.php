<?php namespace Larabook\Users;

/**
 * Class UserRepository
 *
 * @package Larabook\Users
 */
class UserRepository
{

    /**
     * Persist a User
     *
     * @param User $user
     *
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users.
     *
     * @param int $howMany
     *
     * @return User[]
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * Fetch a User by username
     *
     * @param $username
     *
     * @return User
     */
    public function findByUsername($username)
    {
        return User::with(['statuses' => function ($query) {
            $query->latest();
        }])->whereUsername($username)->first();
    }

    /**
     * Find a user by their ID
     * @param $id
     *
     * @return User
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Follow a Larabook User
     * @param                      $userIdToFollow
     * @param \Larabook\Users\User $user
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->follows()->attach($userIdToFollow);
    }
}
