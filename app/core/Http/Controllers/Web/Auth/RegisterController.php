<?php

namespace desabafai\core\Http\Controllers\Web\Auth;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\User\Requests\RegisterRequest;
use desabafai\domains\User\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Artesaos\SEOTools\Facades\SEOMeta;


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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        SEOMeta::setTitle('Desabafaí', false);
        return view('auth.register');
    }
}
