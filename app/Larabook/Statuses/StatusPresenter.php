<?php namespace Larabook\Statuses;

use Laracasts\Presenter\Presenter;

/**
 * Class StatusPresenter
 *
 * @package Larabook\Statuses
 */
class StatusPresenter extends Presenter
{

    /**
     * Display how long it has been since the publish date.
     *
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }
}
