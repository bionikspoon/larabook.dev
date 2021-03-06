<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

/**
 *  registration form validator
 */
class RegistrationForm extends FormValidator
{
    /**
     * Rules for registration
     *
     * @var array
     */
    protected $rules = [
        'username' => 'required|unique:users',
        'email'    => 'required|email|unique:users',
        'password' => 'required|confirmed',
    ];
}
