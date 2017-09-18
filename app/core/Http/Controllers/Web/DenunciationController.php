<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Comment\Comment;
use desabafai\domains\Denunciation\Services\DenunciationService;
use desabafai\domains\Post\Post;
use desabafai\domains\User\User;

class DenunciationController extends Controller
{
    protected $denunciationService;

    public function __construct(DenunciationService $denunciationService)
    {
        $this->middleware('auth');
        $this->denunciationService = $denunciationService;
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
            $this->denunciationService->store(auth()->user(),$model);
            return response()
                ->json([
                    'message'=> 'success',
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
