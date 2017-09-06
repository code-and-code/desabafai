<?php

namespace desabafai\core\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $auth;

    public function __construct()
    {
        $this->middleware(function ($request, $next)
        {
            $this->auth = $request->user();
            return $next($request);
        });
    }
}
