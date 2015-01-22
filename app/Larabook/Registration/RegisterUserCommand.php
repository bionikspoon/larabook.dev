<?php namespace Larabook\Registration;

/**
 * Class RegisterUserCommand
 *
 * @package Larabook\Registration
 */
/**
 * Class RegisterUserCommand
 *
 * @package Larabook\Registration
 */
class RegisterUserCommand
{
    /**
     * @var
     */
    public $username;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $password;

    /**
     * @param $username
     * @param $email
     * @param $password
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
}
