<?php

namespace desabafai\domains\Like\Services;

use desabafai\domains\Like\Like;
use desabafai\domains\Like\LikeRepository;
use desabafai\domains\User\User;

class LikeService
{
     private $likeRepository;

     public function __construct(LikeRepository $likeRepository)
     {
        $this->likeRepository = $likeRepository;
     }

     public function addLike(User $user, $model)
     {
         if(!$model->Likes()->whereUserId($user->id)->first())
         {
             return $model->Likes()->create(['user_id' => $user->id]);
         }
     }

     public function removeLike($likeId)
     {
         $like = $this->likeRepository->find($likeId);
         return $like->delete();
     }
}
