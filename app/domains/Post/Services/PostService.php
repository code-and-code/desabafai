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

     public function store(array $data,User $user,$userFrom = null)
     {
         $newPost = array_add($data,'user_id',$user->id);
         return $this->postRepository->create($newPost);
     }

     public function destroy($id,User $user)
     {
         $post = $this->postRepository->find($id);
         if (\Gate::forUser($user)->allows('authorize', $post)) {
             return $post->delete();
         }
     }
}
