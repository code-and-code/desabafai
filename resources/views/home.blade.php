@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Desabafos</h1>
                @if (count($posts) > 0)
                    <div class="infinite-scroll">
                        @foreach($posts as $post)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" width="64" height="64" src="{{config('avatar.200')}}{{$post->User->nickname}}" alt="">
                                </a>

                                <div class="media-body">
                                    <h4 class="media-heading">{{ $post->title }}
                                        <small>{{ $post->created_at->diffForHumans() }}</small>
                                    </h4>
                                    {{ $post->body }}
                                    <br>
                                    <span class="pull-right">
                                        <i id="like1" class="glyphicon glyphicon-thumbs-up" style="color: #1abc9c; cursor: pointer;"></i>
                                        {{ $post->Likes->count() }}
                                    </span>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jscroll/jquery.jscroll.js') }}"></script>

    <script type="text/javascript">

        $('ul.pagination').hide();

        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {

                    $('ul.pagination').remove();
                }
            });
        });
    </script>


@endsection
