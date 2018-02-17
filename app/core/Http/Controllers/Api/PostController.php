<?php

namespace desabafai\core\Http\Controllers\Api;

use desabafai\domains\Post\Post;
use desabafai\domains\Post\Traits\PostResource;
use desabafai\domains\User\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    private $post;

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        $array = [];
        foreach($posts as $post){
            array_push($array,[
                '_id' => $post->_id,
                'title' => $post->title,
                'body' => $post->body,
                'feeling' => $post->feeling,
                'address' => 'Rua pqp',
                'nickname' => 'Cinognato',
                'like_count' => $post->like_count,
                'comment_count' => '10',
                'created_at' => $post->created_at,
                'comments' => [

                ]
            ]);
        }
        return response()->json($array);
    }

    public function store(Request $request){
        try{
            $request = $this->upload($request);
            return $this->post->create($request->all());
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

    public function update(Request $request, $id){
        $post = $this->post->find($id);
        $post->update($request->all());
        return $post;
    }

    public function delete($id){
        $this->post->find($id)->delete();
    }

    public function toggleLike($id){
        $post = $this->post->find($id);
        $post->update(['like_count' => $post->like_count += 1]);
        return $post;
    }

    public function upload(ProfileRequest $request){

        $photo = $request->file('photo_address');

        if ($photo->isValid()) {
            $extension = $photo->getClientOriginalExtension();

            if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg'){

                //Declara uma url para img principal
                $src = '/img/photos/';
                $destinationPath = public_path().$src;
                $fileName = 'profile-'.auth()->user()->id.'.'.$extension;
                $request->photo_address->move($destinationPath, $fileName);

                $srcResize = $this->resizeImg($fileName, $src);

                //Salva o endereço da img renderizada
                $photo_address = $srcResize.$fileName;
                $request = $request->input()+['photo_address' =>$photo_address];

                return $request;
            }
            return back()->with('error', 'Esse Arquivo precisa ser do tipo JPG ou PNG');
        }
        throw new \Exception('Arquivo Invalido');
    }
}
