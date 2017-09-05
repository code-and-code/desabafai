<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Like\Services\LikeService;
use desabafai\domains\Post\Post;
use desabafai\domains\User\User;
use Illuminate\Http\Request;

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
        $post = Post::find(1);
        $user = User::find(1);

        $this->likeService->addLike($user,$post);

        $posts = Post::paginate(5);
        return view('home',compact('posts'));
    }

    public function show(Request $request)
    {
        $user = User::find($request->slug);
        dd($user);
    }
}
