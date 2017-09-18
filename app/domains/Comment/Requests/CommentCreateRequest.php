<?php

namespace desabafai\domains\Comment\Requests;

use desabafai\support\Request\Request;

class CommentCreateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body'  => 'required',
        ];
    }
}
