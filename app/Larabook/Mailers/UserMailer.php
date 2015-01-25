<?php namespace Larabook\Mailers;

use Larabook\Users\User;

/**
 * Class UserMailer
 *
 * @package Larabook\Mailers
 */
class UserMailer extends Mailer
{
    /**
     * @param \Larabook\Users\User $user
     */
    public function sendWelcomeMessageTo(User $user)
    {
        $subject = 'Welcome to Larabook!';
        $view = 'emails.registration.confirm';

        return $this->sendTo($user, $subject, $view);
    }
}
