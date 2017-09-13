<?php

namespace desabafai\domains\Post\Services;


use desabafai\domains\Post\Post;
use desabafai\domains\Post\PostRepository;
use Illuminate\Foundation\Auth\User;

class PostService
{
     private $postRepository;

     public function __construct(PostRepository $postRepository)
     {
        $this->postRepository = $postRepository;
     }

     public function create(array $data,User $user,$userFrom = null)
     {
         $newPost = array_add($data,'user_id',$user->id);
         return $this->postRepository->create($newPost);
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
