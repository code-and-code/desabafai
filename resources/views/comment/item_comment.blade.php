<li class="collection-item avatar">
    <img src="{{ config('avatar.150')}}{{$comment->User->nickname}}" alt="" class="circle">
    <span class="title">{{$comment->User->nickname}}</span>
    <p></p>
    <div class="row " id="respostas">
        <div class="col s11">
            <p> <span class="teal-text accent-3"></span>{{$comment->body}} </p>

            <a class="blue-text tooltipped" href="#"         data-remote="true" data-type="json" data-method="POST"         data-position="bottom" data-delay="50" data-tooltip="Curtir"><i class=" material-icons tiny">thumb_up</i></a>

            @if($answer)
                <a href="#" class="reply_comment green-text tooltipped" data-form="form_replay_comment_{{$comment->id}}" data-position="bottom" data-delay="50" data-tooltip="Responder"><i class=" material-icons tiny">chat_bubble</i></a>
            @endif

            <a class="red-text tooltipped"  href="#"  data-remote="true" data-type="json" data-confirm="Sério mesmo?" data-method="POST" data-position="bottom" data-delay="50" data-tooltip="Denunciar"><i class="material-icons tiny">do_not_disturb_alt</i></a>

            @auth
                @if($comment->User->id === auth()->user()->id)
                    <a class="like grey-text tooltipped" href="#" data-position="bottom" data-delay="50" data-tooltip="Excluir"><i class="material-icons tiny">delete_sweep</i></a>
                @endif
            @endauth

            @if($answer)
                @include('comment.create_answer', ['comment' => $comment])
            @endif

        </div>
    </div>
    <p class="secondary-content">{{$comment->created_at->diffForHumans()}}</p>

</li>