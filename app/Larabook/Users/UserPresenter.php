<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

/**
 * Class UserPresenter
 *
 * @package Larabook\Users
 */
class UserPresenter extends Presenter
{
    /**
     * Present a link to the user's gravatar.
     *
     * @param int $size
     *
     * @return string
     */
    public function gravatar($size = 30)
    {

        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }

    /**
     * Present number of followers
     *
     * @return string
     */
    public function followerCount()
    {
        $count = $this->entity->followers()->count();
        $plural = str_plural('Follower', $count);

        return sprintf("%d %s", $count, $plural);
    }

    /**
     * Present number of statuses
     *
     * @return string
     */
    public function statusCount()
    {
        $count = $this->entity->statuses()->count();
        $plural = str_plural('Status', $count);

        return sprintf("%d %s", $count, $plural);
    }
}
