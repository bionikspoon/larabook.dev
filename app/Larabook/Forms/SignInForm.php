<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Validator for signing in
 * Class SignInForm
 *
 * @package Larabook\Forms
 */
class SignInForm extends FormValidator
{
    /**
     * Sign in rules
     *
     * @var array
     */
    protected $rules = [
        'email'    => 'required',
        'password' => 'required',
    ];
}
