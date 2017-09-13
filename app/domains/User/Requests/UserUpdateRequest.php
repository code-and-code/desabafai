<?php

namespace desabafai\domains\User\Requests;

use desabafai\support\Request\Request;

class UserUpdateRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required|string|alpha_num|max:20|unique:users,nickname,'.$this->user->id,
            'email'    => 'required|string|email|max:255|unique:users,email,'.$this->user->id,
        ];
    }
}
