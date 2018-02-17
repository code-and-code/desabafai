<?php

namespace desabafai\core\Http\Controllers\Web;

use desabafai\core\Http\Controllers\Controller;
use desabafai\domains\Post\Post;
use desabafai\domains\Post\PostRepository;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        SEOMeta::setTitle('Desabafaí', false);
        SEOMeta::setDescription('Está estrassado? desabafai');
        SEOMeta::setCanonical('https://desabafaai.com.br');
        SEOMeta::addKeyword(['Desabafaí', '']);

        OpenGraph::setTitle('Desabafaí',false);
        OpenGraph::setDescription('Está estrassado? desabafaí');
        OpenGraph::setUrl('https://desabafai.com.br');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('locale', 'pt-br');

        $posts  = $this->postRepository->orderBy('created_at','desk')->paginate(3);

        return view('home',compact('posts'));
    }

    public function posts()
    {
        $posts  = $this->postRepository->orderBy('created_at','desk')->paginate(3);
        $html   = view('post.posts',compact('posts'))->render();
        return response()
            ->json([
                'items' => $html,
                'status' => 200
            ], 200);
    }

    public function about()
    {
        return view('welcome');
    }

}
