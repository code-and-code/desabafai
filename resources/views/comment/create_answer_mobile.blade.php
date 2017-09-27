@auth
<div class="row" hidden id="form_replay_comment_{{$comment->id}}">
    <form class="form_comment_create_comment" method="POST" action="{{route('comment.store.comment',$comment)}}" data-comment="{{$comment->id}}">
        <div class="input-field ">
            <textarea id="icon_prefix2" class="materialize-textarea" name="body"></textarea>
            <label for="icon_prefix2">Responda o concelho...</label>
        </div>
        <button type="submit" value="gravar" class="waves-effect waves-light btn "><i class="large material-icons">subdirectory_arrow_right</i></button>
    </form>
</div>
@endauth

