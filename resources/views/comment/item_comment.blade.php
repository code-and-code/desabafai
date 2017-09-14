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