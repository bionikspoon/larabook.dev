<?php namespace Larabook\Statuses;

/**
 * Class PublishStatusCommand
 *
 * @package Larabook\Statuses
 */
class PublishStatusCommand
{

    /**
     * @var
     */
    public $body;
    /**
     * @var
     */
    public $userId;

    /**
     * @param $body
     * @param $userId
     */
    public function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }
}
