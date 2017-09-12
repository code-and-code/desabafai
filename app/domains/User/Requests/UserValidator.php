<?php

namespace desabafai\domains\User\Requests;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nickname' => 'required|string|max:5|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
            'term_use' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nickname' => 'required|numeric|max:5|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
        ]
    ];

    protected $messages = [
        'nickname.required' => 'The :attribute field is required.',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */

}
