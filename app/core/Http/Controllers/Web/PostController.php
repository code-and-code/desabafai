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
            $this->postService->create($request->input(),auth()->user());
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

    }

    public function like(Post $post,LikeService $likeService)
    {
        try{
            $likeService->addLike(auth()->user(),$post);
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

    public function addComment(Request $request,Post $post)
    {
        try{

            $comment = $post->Comments()->create(['user_id' => auth()->user()->id,'body' => 'teste']);
            $html = view('comment.item_comment')->with('comment',$comment)->render();
            return response()
                ->json([
                    'data' => $html,
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
