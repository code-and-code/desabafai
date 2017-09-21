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
            'nickname' => 'required|string|max:20|min:5|unique:users,nickname,'.$this->user->id,
            'email'    => 'required|string|email|max:50|unique:users,email,'.$this->user->id,
        ];
    }
}
