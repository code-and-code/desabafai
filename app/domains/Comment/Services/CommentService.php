<?php

namespace desabafai\domains\Comment\Services;

use Illuminate\Foundation\Auth\User;

class CommentService
{
     public function store(array $data,$model,User $user)
     {
         if(method_exists($model,'Comments')){
             $newComment = array_add($data,'user_id',$user->id);
             return $model->Comments()->create($newComment);
         }
         throw new \Exception('There is no relationship, Comments');
     }

}
