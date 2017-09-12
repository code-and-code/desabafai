<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Post\Post;
use desabafai\domains\User\Services\UserService;
use desabafai\domains\User\User;
use desabafai\domains\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    protected $service;

    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->user = $repository;
        $this->service = $service;
    }

    public function show($nickname = null)
    {
        $user  = $this->user->whereNickname($nickname)->first();
        $posts = Post::whereUserId($user->id)->orWhere('user_from_id',$user->id)->paginate(10);
        return view('home',compact('posts'));
    }

    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(User $user , Request $request ){
        try{

            $this->service->update($request->input(), $user->id);
            return response()
                ->json([
                    'message' => 'Success',
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
