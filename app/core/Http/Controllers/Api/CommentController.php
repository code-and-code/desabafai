<?php

namespace desabafai\core\Http\Controllers\Api;

use desabafai\domains\Comment\Comment;
use desabafai\domains\Post\Traits\PostResource;
use desabafai\domains\User\User;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment){
        $this->comment = $comment;
    }



}
