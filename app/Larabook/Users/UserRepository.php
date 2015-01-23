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
}
