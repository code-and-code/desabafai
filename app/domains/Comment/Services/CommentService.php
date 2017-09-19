<?php

namespace desabafai\domains\Comment\Services;

use desabafai\domains\Comment\Comment;
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

    public function destroy($id,User $user)
    {
        $comment = Comment::find($id);
        if (\Gate::forUser($user)->allows('authorize', $comment)) {

            return $comment->delete();
        }
        throw new \Exception('Could not delete');
    }

}
