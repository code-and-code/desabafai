@foreach($post->comments->take(3) as $comment)

        <!-- comentarios -->
@include('comment.item_comment_mobile', ['comment' => $comment, 'answer' => true])
        <!-- comentarios -->

<!-- repostas -->
<div style="margin-left: 10px" class="answer" id="answer_{{ $comment->id }}" hidden>
    <div id="new_answer_{{ $comment->id }}"></div>

    @foreach($comment->comments->take(3) as $answer)
        @include('comment.item_comment_mobile', ['comment' => $answer, 'answer' => false])
    @endforeach
</div>
<!-- repostas -->

@endforeach