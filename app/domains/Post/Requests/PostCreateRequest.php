<?php

namespace desabafai\domains\Post\Requests;

use desabafai\support\Request\Request;

class PostCreateRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'body' =>  '',
        ];
    }
}
