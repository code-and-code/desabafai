<?php

namespace desabafai\domains\User\Requests;

use desabafai\support\Request\Request;

class RegisterRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required|string|max:12|unique:users',
            'email'    => 'required|string|email|max:255|unique:users',
            'term_use' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
