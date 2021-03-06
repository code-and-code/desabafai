<li id="comment_id_{{$comment->id}}">
    <div class="collapsible-header">
        <i class="material-icons">account_circle</i>
        <span class="title"><a href="/{{$comment->User->nickname}}"> {{$comment->User->nickname}}</a></span>
        <span class="badge">{{$comment->created_at->diffForHumans()}}</span>
    </div>
    <div class="collapsible-body">
        <p>{!! $comment->getBody(20) !!}</p>
        @auth
        <div class="row">
            <a class="deep-purple-text like" href="{{route('like.store.comment',$comment)}}" data-remote="true" data-type="json" data-method="POST" >{{ $comment->Likes->count() }} <i class=" material-icons ">thumb_up</i></a>

            @if($answer)
                <a href="#"  class="reply_comment blue-grey-text " data-form="form_replay_comment_{{$comment->id}}" > <i class=" material-icons ">reply </i></a>
            @endif

            <span style="padding: 0px 2px"></span>

            <a href="{{route('denunciation.store.comment',$comment)}}" data-remote="true" data-confirm="Sério mesmo?" data-method="POST" class="red-text " ><i class="material-icons ">do_not_disturb_alt</i></a>

            <span style="padding: 0px 2px"></span>

            @if($comment->User->id === auth()->user()->id)
                <a href="{{route('comment.destroy',$comment)}}" data-remove="comment_id_{{$comment->id}}" data-confirm="Tem certeza?" class="grey-text  destroy" ><i class="material-icons ">delete_sweep</i></a>
            @endif

            <span style="padding: 0px 2px"></span>

            @if($answer)
                <a id="read_answer" data-answer="{{ $comment->id }}" class="link_answer waves-effect waves-light">{{ $comment->comments->count() }}  <i class="material-icons">chat_bubble</i> </a>
            @endif

            @if($answer)
                @include('comment.create_answer', ['comment' => $comment])
            @endif
        </div>
        @endauth
    </div>
</li>
<div class="divider"></div>


