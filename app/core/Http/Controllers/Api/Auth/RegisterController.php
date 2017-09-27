<?php

namespace desabafai\core\Http\Controllers\Api\Auth;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\User\Requests\RegisterRequest;
use desabafai\domains\User\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        if ($user = $this->create($request->all())) {

            event(new Registered($user));

            $this->guard()->login($user);

            return response()
                ->json([
                    'data' =>  ['url' => $this->redirectTo],
                    'status' => 200
                ], 200);
        } else {
            return response()
                ->json([
                    'message' => 'Error while registering',
                    'status' => 400
                ], 400);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \desabafai\domains\User\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nickname'  => $data['nickname'],
            'email'     => $data['email'],
            'term_use'  => $data['term_use'],
            'password'  => bcrypt($data['password']),
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
