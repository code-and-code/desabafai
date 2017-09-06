<?php

namespace desabafai\domains\Like\Services;

use desabafai\domains\Like\Like;
use desabafai\domains\User\User;

class LikeService
{
     private $like;

     public function __construct(Like $like)
     {
        $this->like = $like;
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
         $like = $this->like->find($likeId);
         return $like->delete();
     }
}
