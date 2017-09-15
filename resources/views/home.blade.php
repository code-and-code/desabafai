@extends('layouts.app')

@section('content')

    @if(isset($user))

        @include('user._profile',['user' =>$user])

    @endif

@mobile
    @include('post.posts_mobile')
@elsemobile
    @include('post.posts')
@endmobile


@endsection

@section('scripts')
    <script>
        require(['./home']);
    </script>
@endsection
