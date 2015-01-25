<?php namespace Larabook\Handlers;

use Larabook\Mailers\UserMailer;
use Larabook\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventListener;

/**
 * Class EmailNotifier
 *
 * @package Larabook\Handlers
 */
class EmailNotifier extends EventListener
{
    /**
     * @var \Larabook\Mailers\UserMailer
     */
    private $mailer;

    /**
     * @param \Larabook\Mailers\UserMailer $mailer
     */
    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param \Larabook\Registration\Events\UserHasRegistered $event
     */
    public function whenUserHasRegistered(UserHasRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }
}
