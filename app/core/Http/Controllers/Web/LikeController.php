<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Comment\Comment;
use desabafai\domains\Like\Services\LikeService;
use desabafai\domains\Post\Post;
use desabafai\domains\User\User;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->middleware('auth');
        $this->likeService = $likeService;
    }

    public function storeForUser(User $user)
    {
        return $this->store($user);
    }

    public function storeForPost(Post $post)
    {
        return $this->store($post);
    }

    public function storeForComment(Comment $comment)
    {
        return $this->store($comment);
    }

    private function store($model)
    {
        try{
            $this->likeService->store(auth()->user(),$model);
            return response()
                ->json([
                    'data'   => ['id'=>$model->id,'likes'=> $model->likes->count()] ,
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
