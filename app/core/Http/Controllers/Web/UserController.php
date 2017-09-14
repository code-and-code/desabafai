<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Post\Post;
use desabafai\domains\Post\PostRepository;
use desabafai\domains\User\Requests\UserUpdateRequest;
use desabafai\domains\User\Services\UserService;
use desabafai\domains\User\User;
use desabafai\domains\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService    = $userService;
    }

    public function show($nickname = null)
    {
        $user   = $this->userService->getUserProfile($nickname);
        if($user)
        {
            $posts  = $user->posts()->paginate(10);
            return view('home',compact('posts','user'));
        }
        abort(404);
    }

    public function edit(User $user)
    {
        if (\Gate::forUser(auth()->user())->allows('authorize-user', $user)) {
            return view('user.edit',compact('user'));
        }
        abort(404);
    }

    public function update(User $user , UserUpdateRequest $request ){
        try{
            $this->userService->update($request->input(), $user->id);
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
