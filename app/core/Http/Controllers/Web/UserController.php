<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Post\Post;
use desabafai\domains\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show($nickname = null)
    {
        $user  = $this->user->whereNickname($nickname)->first();
        $posts = Post::whereUserId($user->id)->orWhere('user_from_id',$user->id)->paginate(10);
        return view('home',compact('posts'));
    }
}
