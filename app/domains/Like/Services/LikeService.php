<?php

namespace desabafai\domains\Like\Services;

use desabafai\domains\Like\LikeRepository;
use desabafai\domains\User\User;

class LikeService
{
     private $likeRepository;

     public function __construct(LikeRepository $likeRepository)
     {
         $this->likeRepository = $likeRepository;
     }

    public function store(User $user, $model)
     {
         if(method_exists($model,'Likes')){

             if(!$model->Likes()->whereUserId($user->id)->first())
             {
                 return $model->Likes()->create(['user_id' => $user->id]);
             }
         }
         throw new \Exception('There is no relationship, Comments');
     }

     public function destroy($id,User $user)
     {
         $like = $this->likeRepository->find($id);
         if (\Gate::forUser($user)->allows('authorize', $like)) {
             return $like->delete();
         }
     }
}
