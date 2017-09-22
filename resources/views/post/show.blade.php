@extends('layouts.app')

@section('content')

<div id="post_id_{{$post->id}}">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-image">
                    <img src="{{$post->img}}">
                </div>
                <div class="card-content">
                    <p class="secondary-content"> <span class="teal-text">{{$post->created_at->diffForHumans()}}</span></p>
                    <span class="card-title">{{$post->title}}</span>
                    <p>{!! $post->body !!}</p>
                    <a href="https://www.google.com.br/maps/search/{{$post->address}}" target="_blank"><small>{{$post->address}}</small></a>
                </div>
                @mobile

                <div class="card-action">

                    @auth
                    <a href="{{route('like.store.post',$post)}}" class="waves-effect waves-light like  deep-purple-text " title="Curtir" data-like="like_{{$post->id}}">
                        <i class="material-icons" id="like_{{$post->id}}">thumb_up</i>
                    </a>
                    @endauth

                    <a class="blue-grey-text waves-effect waves-light show_comments" title="Conselhos" id="{{$post->id}}" data-comments="comments_{{$post->id}}">
                        <i class="material-icons">question_answer</i>
                    </a>

                    <div class="chip right">
                        <img src="{{ config('avatar.150')}}{{$post->User->nickname}}" alt="">
                        <a href="/{{$post->User->nickname}}" class="black-text"> {{$post->User->nickname}}</a>
                    </div>

                </div>
                <div class="card-action">

                    <span id="like_count_{{$post->id}}">{{$post->Likes->count()}}</span> Curtidas <span
                            style="padding: 0px 2%"></span>

                    {{$post->comments->count()}} Comentários

                    <a class="modal-trigger right" href="#post_modal_{{$post->id}}" title="Mais Ações"><i class="material-icons">more_vert</i></a>
                </div>

                @elsemobile

                <div class="card-action">

                    @auth
                    <a class="tooltipped  waves-effect waves-light like  deep-purple-text " title="Curtir"
                       data-tooltip="Curtir" data-like="like_{{$post->id}}" data-position="bottom" data-delay="50"
                       href="{{route('like.store.post',$post)}}">
                        <i class="material-icons" id="like_{{$post->id}}">thumb_up</i>
                    </a>
                    @endauth

                    <a class="tooltipped blue-grey-text waves-effect waves-light show_comments" title="Conselhos"
                       id="{{$post->id}}" data-comments="comments_{{$post->id}}" data-position="right" data-delay="50"
                       data-tooltip="Conselhos">
                        <i class="material-icons">question_answer</i>
                    </a>

                    <div class="chip right">
                        <img src="{{ config('avatar.150')}}{{$post->User->nickname}}" alt="">
                        <a href="/{{$post->User->nickname}}" class="black-text"> {{$post->User->nickname}}</a>
                    </div>

                </div>
                <div class="card-action">

                    <span id="like_count_{{$post->id}}">{{$post->Likes->count()}}</span> Curtidas <span
                            style="padding: 0px 2%"></span>

                    {{$post->comments->count()}} Comentários

                    <a class="modal-trigger right tooltipped" href="#post_modal_{{$post->id}}" data-position="top"
                       data-delay="50" data-tooltip="Mais Ações"><i class="material-icons">more_vert</i></a>
                </div>

                @endmobile
            </div>
            <!-- form create comment -->
            <!-- and form create comment -->

            <ul class="collection" id="comments_{{$post->id}}" >

                <div id="new_comment_{{$post->id}}"></div>
                @foreach($post->comments as $comment)

                        <!-- comentarios -->
                @include('comment.item_comment', ['comment' => $comment, 'answer' => true])

                <div  style="margin-left: 60px" class="answer" id="answer_{{ $comment->id }}" hidden>
                    @foreach($comment->comments as $answer)
                        @include('comment.item_comment', ['comment' => $answer, 'answer' => false])
                        <div class="divider"></div>
                    @endforeach
                </div>
                <!-- repostas -->
                <div id="new_answer_{{ $comment->id }}"></div>
                @endforeach

                @auth

                <form class="form_post_create_comment" method="POST" action="{{route('comment.store.post',$post)}}" data-post="{{$post->id}}">

                    <div class="input-field container">
                        <i class="material-icons prefix">speaker_notes</i>
                        <textarea id="icon_prefix2" class="materialize-textarea" name="body"></textarea>
                        <label for="icon_prefix2">Escreva um conselho...</label>
                    </div>

                    <button type="submit" value="gravar" class="waves-effect waves-light btn right" style="margin-bottom: 20px; margin-right: 20px"><i class="large material-icons">send</i></button>

                </form>
                @endauth
            </ul>
        </div>
    </div>
</div>

<div id="post_modal_{{$post->id}}" class="modal">
    <div class="modal-content">
        <div class="collection center-align">
            @auth
            <a href="{{route('denunciation.store.post',$post)}}" data-remote="true" data-confirm="Sério mesmo?" data-method="POST" class="collection-item">Denunciar</a>
            @if($post->User->id === auth()->user()->id)
                <a href="{{route('post.destroy',$post)}}" data-remove="post_id_{{$post->id}}" data-confirm="Tem certeza" class="modal-action modal-close collection-item destroy">Excluir</a>
            @endif
            @endauth
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/controllers/homeController.js') }}"></script>
@endsection