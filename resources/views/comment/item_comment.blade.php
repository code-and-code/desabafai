<li class="collection-item avatar " id="comment_id_{{$comment->id}}">
    <img src="{{ config('avatar.150')}}{{$comment->User->nickname}}" alt="" class="circle">
    <span class="title"><a href="/{{$comment->User->nickname}}"> {{$comment->User->nickname}}</a></span>
    <p></p>
    <div class="row " id="respostas">
        <div class="col s11">
            <p> <span class="teal-text accent-3"></span>{!! $comment->body !!}</p>
            @auth
                <a class="deep-purple-text tooltipped like" href="{{route('like.store.comment',$comment)}}" data-remote="true" data-type="json" data-method="POST"  data-position="bottom" data-delay="50" data-tooltip="Curtir"><i class=" material-icons tiny">thumb_up</i></a>

                @if($answer)
                    <a href="#" class="reply_comment blue-grey-text tooltipped" data-form="form_replay_comment_{{$comment->id}}" data-position="bottom" data-delay="50" data-tooltip="Responder"><i class=" material-icons tiny">chat_bubble</i></a>
                @endif

                <a href="{{route('denunciation.store.comment',$comment)}}" data-remote="true" data-confirm="Sério mesmo?" data-method="POST" class="red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Denunciar"><i class="material-icons tiny">do_not_disturb_alt</i></a>

                @if($comment->User->id === auth()->user()->id)
                        <a href="{{route('comment.destroy',$comment)}}" data-remove="comment_id_{{$comment->id}}" data-confirm="Tem certeza?" class="grey-text tooltipped destroy" data-position="bottom" data-delay="50" data-tooltip="Excluir"><i class="material-icons tiny">delete_sweep</i></a>
                    @endif

               @if($answer)
                    <a id="read_answer" data-answer="{{ $comment->id }}" class="link_answer waves-effect waves-light "> <span class="new badge" data-badge-caption="Respostas"> {{ $comment->comments->count() }} </span>  </a>
                @endif

                <a data-answer="{{ $comment->id }}" class="link_answer waves-effect waves-light "> <span class="new badge purple" data-badge-caption="Curtidas"> {{ $comment->Likes->count() }} </span>  </a>

                @if($answer)
                    @include('comment.create_answer', ['comment' => $comment])
                @endif
            @endauth
        </div>
    </div>
    <p class="secondary-content">{{$comment->created_at->diffForHumans()}}</p>
</li>
<div class="divider"></div>