<div class="infinite-scroll">

@foreach($posts as $post)

    @include('post._post',['post' =>$post])

@endforeach

<div id="scroll"></div>

{{$posts->links()}}

</div>
