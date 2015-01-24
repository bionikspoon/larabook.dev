<?php namespace Larabook\Users;

/**
 * Class FollowableTrait
 *
 * @package Larabook\Users
 */
trait FollowableTrait
{

    /**
     * Determine if current user follows another user
     *
     * @param \Larabook\Users\User $otherUser
     *
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

    /**
     * Get this list users that the current user follows.
     *
     * @return User[]
     */
    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    /**
     * Get the list of users who follow current user.
     *
     * @return User[]
     */
    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }
}