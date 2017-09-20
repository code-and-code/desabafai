@extends('layouts.app')

@section('content')

    @if(isset($user))

        @mobile
            @include('user._profile_mobile', ['user' => $user])
        @elsemobile
            @include('user._profile',['user' =>$user])
        @endmobile

    @endif

@mobile
    @include('post.posts_mobile')
@elsemobile
    @include('post.posts')
@endmobile


@endsection

@section('scripts')

    <script src="{{ asset('js/vendor/jscroll/jquery.jscroll.js') }}"></script>
    <script src="{{ asset('js/controllers/homeController.js') }}"></script>

@endsection
