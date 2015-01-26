<?php namespace Larabook\Statuses;

/**
 * Class Comment
 *
 * @package Larabook\Statuses
 */
class Comment extends \Eloquent
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'status_id', 'body'];

    /**
     * @param $body
     * @param $status_id
     *
     * @return Comment
     */
    public static function leave($body, $status_id)
    {
        return new static([
            'body'      => $body,
            'status_id' => $status_id
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }
}
