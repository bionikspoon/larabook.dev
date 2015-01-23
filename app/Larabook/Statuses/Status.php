<?php namespace Larabook\Statuses;

use Eloquent;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class Status model
 *
 * @package Larabook\Statuses
 */
class Status extends Eloquent
{
    use EventGenerator, PresentableTrait;


    /**
     * Fillable fields for a new status
     *
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * Path to presenter for a status
     *
     * @var string
     */
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    /**
     * Publish status event
     *
     * @param $body
     *
     * @return static
     */
    public static function publish($body)
    {

        $status = new static (compact('body'));
        $status->raise(new StatusWasPublished($body));

        return $status;
    }

    /**
     * Belongs to a user, one to many
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }
}
