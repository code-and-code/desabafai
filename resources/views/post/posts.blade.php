<div class="infinite-scroll">

@foreach($posts as $post)

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
                        <p>{{$post->body}}</p>
                        <a href="https://www.google.com.br/maps/search/{{$post->address}}" target="_blank"><small>{{$post->address}}</small></a>
                    </div>
                    <div class="card-action">

                        <a class="tooltipped  waves-effect waves-light like blue-text" title="Curtir" data-tooltip="Curtir" data-like="like_{{$post->id}}" data-position="bottom" data-delay="50" href="{{route('like.store.post',$post)}}">
                            <i class="material-icons" id="like_{{$post->id}}">thumb_up</i>
                        </a>

                        <a class="tooltipped red-text waves-effect waves-light show_comments" title="Conselhos" id="{{$post->id}}" data-comments="comments_{{$post->id}}" data-position="right" data-delay="50" data-tooltip="Conselhos">
                            <i class="material-icons">question_answer</i>
                        </a>

                        <div class="chip right">
                            <img src="{{ config('avatar.150')}}{{$post->User->nickname}}" alt="">
                            <a href="/{{$post->User->nickname}}" class="black-text"> {{$post->User->nickname}}</a>
                        </div>

                    </div>
                    <div class="card-action">

                        <div id="like_count_{{$post->id}}">{{$post->Likes->count()}}</div> Curtidas

                        <a class="modal-trigger right tooltipped" href="#post_modal_{{$post->id}}" data-position="top" data-delay="50" data-tooltip="Mais Ações"><i class="material-icons">more_vert</i></a>
                    </div>
                </div>
                <!-- form create comment -->
                <!-- and form create comment -->

                <ul class="collection" id="comments_{{$post->id}}" hidden>

                    <div id="new_comment_{{$post->id}}"></div>

                    @foreach($post->comments->take(3) as $comment)

                        <!-- comentarios -->
                        @include('comment.item_comment', ['comment' => $comment, 'answer' => true])
                        <!-- comentarios -->

                        <!-- repostas -->
                        <div  style="margin-left: 60px" class="answer" >
                            @foreach($comment->comments->take(3) as $answer)
                                @include('comment.item_comment', ['comment' => $answer, 'answer' => false])
                            @endforeach
                        </div>
                        <!-- repostas -->
                    <div id="new_answer_{{ $comment->id }}"></div>
                    @endforeach

                    @auth
                    <li class="collection-item">
                        <form class="form_post_create_comment" method="POST" action="{{route('comment.store.post',$post)}}" data-post="{{$post->id}}">
                            <div class="input-field ">
                                <i class="material-icons prefix">speaker_notes</i>
                                <textarea id="icon_prefix2" class="materialize-textarea" name="body"></textarea>
                                <label for="icon_prefix2">Escreva um conselho...</label>
                            </div>
                            <button type="submit" value="gravar" class="waves-effect waves-light btn "><i class="large material-icons">send</i></button>
                        </form>
                        <a class="fast" data-params="f.jpg"    data-target="new_comment_{{$post->id}}" href="{{route('comment.store.post',$post)}}">Fod..</a>
                        <a class="fast" data-params="haha.jpg" data-target="new_comment_{{$post->id}}" href="{{route('comment.store.post',$post)}}">KKKKk</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    <div id="post_modal_{{$post->id}}" class="modal">
        <div class="modal-content">
            <div class="collection center-align">
                <a href="{{route('post.show',$post)}}" class="collection-item">Vizualizar</a>
                <a href="{{route('denunciation.store.post',$post)}}" data-remote="true" data-confirm="Sério mesmo?" data-method="POST" class="collection-item">Denunciar</a>

                @auth
                        @if($post->User->id === auth()->user()->id)
                        <a href="{{route('post.destroy',$post)}}" data-remove="post_id_{{$post->id}}" data-confirm="Tem certeza" class="modal-action modal-close collection-item destroy">Excluir</a>
                        @endif
                @endauth
            </div>

        </div>
    </div>
@endforeach

<div id="scroll"></div>

{{$posts->links()}}

</div>