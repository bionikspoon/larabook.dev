<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

/**
 * Validator for publishing a status
 * Class PublishStatusForm
 *
 * @package Larabook\Forms
 */
class PublishStatusForm extends FormValidator
{
    /**
     * Rules to validate
     *
     * @var array
     */
    protected $rules = [
        'body' => 'required',
    ];
}
