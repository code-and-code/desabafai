<li class="collection-item avatar " id="comment_id_{{$comment->id}}">
    <img src="{{ config('avatar.150')}}{{$comment->User->nickname}}" alt="" class="circle">
    <span class="title"><a href="/{{$comment->User->nickname}}"> {{$comment->User->nickname}}</a></span>
    <p></p>
    <div class="row " id="respostas">
        <div class="col s11">
            <p> <span class="teal-text accent-3"></span>{!! $comment->body !!}</p>
            @auth
            <div class="row">
                <a class="no-padding deep-purple-text like" href="{{route('like.store.comment',$comment)}}" data-remote="true" data-type="json" data-method="POST" >{{ $comment->Likes->count() }} <i class=" material-icons ">thumb_up</i></a>

                <span style="padding: 0px 2px"></span>

                @if($answer)
                    <a href="#" id="read_answer" class="reply_comment blue-grey-text " data-form="form_replay_comment_{{$comment->id}}" > <i class=" material-icons ">chat_bubble</i></a>
                @endif

                <span style="padding: 0px 5px"></span>

                <a href="{{route('denunciation.store.comment',$comment)}}" data-remote="true" data-confirm="Sério mesmo?" data-method="POST" class="red-text " ><i class="material-icons ">do_not_disturb_alt</i></a>

                <span style="padding: 0px 2px"></span>

                @if($comment->User->id === auth()->user()->id)
                    <a href="{{route('comment.destroy',$comment)}}" data-remove="comment_id_{{$comment->id}}" data-confirm="Tem certeza?" class="grey-text  destroy" ><i class="material-icons ">delete_sweep</i></a>
                @endif

                @if($answer)
                    <a id="" data-answer="{{ $comment->id }}" class="link_answer waves-effect waves-light right">{{ $comment->comments->count() }}  <i class="material-icons">remove_red_eye</i> </a>
                @endif

                @if($answer)
                    @include('comment.create_answer', ['comment' => $comment])
                @endif
            </div>

            @endauth

        </div>
    </div>
    <p class="secondary-content">{{$comment->created_at->diffForHumans()}}</p>
</li>
<div class="divider"></div>


