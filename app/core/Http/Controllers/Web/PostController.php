<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Like\Services\LikeService;
use desabafai\domains\Post\Post;
use desabafai\domains\Post\Requests\PostCreateRequest;
use desabafai\domains\Post\Services\PostService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->middleware('auth:web',['except' => ['show','index']]);
        $this->postService     = $postService;
    }

    public function index($slug = null)
    {
        $post   = $this->postService->searchBySlug($slug);
        if($post)
        {
            return $this->show($post);
        }
        abort(404);

   }

    public function create()
    {
        SEOMeta::setTitle('Desabafaí', false);
        return view('post.create');
    }

    public function store(PostCreateRequest $request)
    {
        try{
            $this->postService->store($request->input(),auth()->user());
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

    public function show(Post $post)
    {
        SEOMeta::setTitle($post->title, false);
        SEOMeta::setDescription($post->title);
        SEOMeta::setCanonical(route('post.slug',$post->slug));
        SEOMeta::addKeyword(explode('-',$post->slug));

        OpenGraph::setDescription($post->title);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl(route('post.show',$post));
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('locale', 'pt-br');

        return view('post.show')->with(['post'=> $post]);
    }

    public function destroy(Post $post)
    {
        try{
            $this->postService->destroy($post->id,auth()->user());
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
