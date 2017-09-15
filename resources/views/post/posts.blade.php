@foreach($posts as $post)

    <div id="my_card_{{$post->id}}">
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-image">
                        <img src="{{$post->img}}">
                    </div>
                    <div class="card-content">
                        <p class="secondary-content"> <span class="teal-text">{{$post->created_at->diffForHumans()}}</span></p>
                        <span class="card-title">{{$post->title}}</span>
                        <p>{{$post->body}}</p>
                        <small>{{$post->address}}</small>
                    </div>
                    <div class="card-action">

                        <a class="tooltipped  waves-effect waves-light" title="Curtir" data-tooltip="Curtir" id="like" data-position="bottom" data-delay="50" href="{{route('post.like',$post)}}" data-remote="true" data-method="get" data-like="like_{{$post->id}}">
                            <i class="material-icons" id="thumb_up">thumb_up</i>
                        </a>

                        <a class="tooltipped red-text waves-effect waves-light show_comments" title="Conselhos" id="{{$post->id}}" data-comments="comments_{{$post->id}}" data-position="right" data-delay="50" data-tooltip="Conselhos">
                            <i class="material-icons">question_answer</i>
                        </a>

                        <div class="chip right">
                            <img src="{{ config('avatar.150')}}{{$post->User->nickname}}" alt="">
                            <a href="/{{$post->User->nickname}}"> {{$post->User->nickname}}</a>
                        </div>

                    </div>
                    <div class="card-action">

                        <div id="like_{{$post->id}}">{{$post->Likes->count()}}</div> Curtidas

                        <a class="modal-trigger right tooltipped" href="#modal2" data-position="top" data-delay="50" data-tooltip="Mais Ações"><i class="material-icons">more_vert</i></a>
                    </div>
                </div>

                <!-- form create comment -->
                <!-- and form create comment -->

                <ul class="collection" id="comments_{{$post->id}}" hidden>

                    <div id="new_comment_{{$post->id}}"></div>

                    @foreach($post->comments->take(3) as $comment)

                        <li class="collection-item avatar">
                            <img src="{{ config('avatar.150')}}{{$comment->User->nickname}}" alt="" class="circle">
                            <span class="title">{{$comment->User->nickname}}</span>
                            <p></p>
                            <div class="row " id="respostas">
                                <div class="col s11">
                                    <p> <span class="teal-text accent-3"></span>{{$comment->body}} </p>

                                    <a href="#">Curtir</a> -

                                    <a href="#" class="reply_comment" data-form="form_replay_comment_{{$comment->id}}">Responder</a>

                                    <div class="row" hidden id="form_replay_comment_{{$comment->id}}">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">speaker_notes</i>
                                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                                            <label for="icon_prefix2">Escreva um consenho..</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <p class="secondary-content">{{$comment->created_at->diffForHumans()}}</p>
                        </li>
                    @endforeach

                    <li class="collection-item">
                        <form class="form_create_comment" method="POST" action="{{route('post.comment',$post)}}" data-remote="true" data-post="{{$post->id}}">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">speaker_notes</i>
                                <textarea id="icon_prefix2" class="materialize-textarea" name="body"></textarea>
                                <label for="icon_prefix2">Escreva um conselho...</label>
                            </div>
                            <input type="submit" value="gravar">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <div class="collection center-align">
                <a href="#!" class="collection-item">Vizualizar</a>
                <a href="#!" class="collection-item">Denunciar</a>
                <a href="#!" class="modal-action modal-close collection-item">Cancelar</a>
            </div>

        </div>
    </div>

@endforeach

<div id="scroll"></div>

{{$posts->links()}}