<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Like\Services\LikeService;
use desabafai\domains\Post\Post;
use desabafai\domains\Post\Requests\PostCreateRequest;
use desabafai\domains\Post\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->middleware('auth:web');
        $this->postService     = $postService;
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(PostCreateRequest $request)
    {
        try{
            $this->postService->store($request->input(),auth()->user());
            return response()
                ->json([
                    'message' => 'Success',
                    'status' => 200
                ], 200);

        }catch (\Exception $e)
        {
            return response()
                ->json([
                    'message' => $e->getMessage(),
                    'status' => 400
                ], 400);
        }
    }

    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    public function destroy(Post $post)
    {
        try{
            $this->postService->destroy($post->id,auth()->user());
            return response()
                ->json([
                    'message' => 'Success',
                    'status' => 200
                ], 200);

        }catch (\Exception $e)
        {
            return response()
                ->json([
                    'message' => $e->getMessage(),
                    'status' => 400
                ], 400);
        }
    }
}
