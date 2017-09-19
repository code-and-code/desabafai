<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Comment\Comment;
use desabafai\domains\Comment\Requests\CommentCreateRequest;
use desabafai\domains\Post\Post;
use desabafai\domains\Comment\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->middleware('auth');
        $this->commentService = $commentService;
    }

    public function storeForPost(CommentCreateRequest $request,Post $post)
    {
        try{
            $comment = $this->commentService->store($request->input(),$post,auth()->user());
            $html    = view('comment.item_comment')->with(['comment'=>$comment, 'answer' => true ])->render();
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

    public function storeForComment(CommentCreateRequest $request,Comment $comment)
    {
        try{
            $comment = $this->commentService->store($request->input(),$comment,auth()->user());
            $html    = view('comment.item_comment')->with(['comment'=>$comment, 'answer' => false ])->render();
            return response()
                ->json([
                    'data'   => $html,
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

    public function destroy(Comment $comment)
    {
        try{
            $this->commentService->destroy($comment->id,auth()->user());
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
