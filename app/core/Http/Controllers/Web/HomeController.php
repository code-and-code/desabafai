<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Post\PostPresenter;
use desabafai\domains\Post\PostRepository;
use desabafai\domains\Post\Post;
use Illuminate\Support\Facades\View;
use Sassnowski\LaravelShareableModel\Shareable\ShareableLink;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts  = $this->postRepository->orderBy('created_at','desk')->paginate(3);
        return view('home',compact('posts'));
    }

    public function posts()
    {
        $posts  = $this->postRepository->orderBy('created_at','desk')->paginate(3);
        $html   = view('post.posts',compact('posts'))->render();
        return response()
            ->json([
                'items' => $html,
                'status' => 200
            ], 200);
    }
}
