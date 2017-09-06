<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Like\Services\LikeService;
use desabafai\domains\Post\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('home',compact('posts'));
    }
}
