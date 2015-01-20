<?php namespace Larabook\Registration;


/**
 * Class RegisterUserCommand
 * @package Larabook\Registration
 */
class RegisterUserCommand
{
    public $username;
    public $email;
    public $password;

    /**
     * @param $username
     * @param $email
     * @param $password
     */
    function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


}