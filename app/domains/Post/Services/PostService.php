<?php

namespace desabafai\domains\Post\Services;


use desabafai\domains\Post\Post;
use Illuminate\Foundation\Auth\User;

class PostService
{
     private $post;

     public function __construct(Post $post)
     {
        $this->post = $post;
     }

     public function create(array $data,User $user,$userFrom = null)
     {
         $newPost = array_add($data,'user_id',$user->id);
         return $this->post->create($newPost);
     }

     public function find($id)
     {
        return $this->post->find($id);
     }

     public function update(array $data,User $user,Post $post)
     {
        return $post->update($data);
     }

     public function delete(User $user, Post $post)
     {
        return $post->delete();
     }
}
