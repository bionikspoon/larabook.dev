<?php namespace Larabook\Statuses\Events;

/**
 * Class StatusWasPublished event
 *
 * @package Larabook\Statuses\Events
 */
class StatusWasPublished
{
    /**
     * @var
     */
    public $body;

    /**
     * @param $body
     */
    function __construct($body)
    {
        $this->body = $body;
    }
}
