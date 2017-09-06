<?php

namespace desabafai\domains\Post\Traits;

use desabafai\domains\Post\Requests\PostCreateRequest;
use desabafai\domains\Post\Services\PostService;

trait PostResource
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        parent::__construct();
        $this->postService = $postService;
    }

    public function store(PostCreateRequest $request)
    {
        $this->postService->create($request->all(),$this->auth);

        if($request->ajax())
        {
            return response()->json([
            'message' => 'Success',
            'status' => 200
        ], 200);
        }

        return back()->with('success','Success');
    }


    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}