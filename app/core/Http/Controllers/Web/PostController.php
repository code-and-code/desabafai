<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Post\Post;
use desabafai\domains\Post\Requests\PostCreateRequest;
use desabafai\domains\Post\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->middleware('auth');
        $this->postService = $postService;
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(PostCreateRequest $request)
    {

    }

    public function show(Post $post)
    {

    }
}
