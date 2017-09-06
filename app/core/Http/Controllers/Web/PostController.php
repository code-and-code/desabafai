<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;

class PostController extends Controller
{
    private $auth;

    public function __construct()
    {
        $this->auth = auth();
    }

    public function index()
    {
        dd($this->auth);
    }
}
