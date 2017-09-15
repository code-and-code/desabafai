@extends('layouts.app')

@section('content')

    @if(isset($user))

        @include('user._profile_mobile')

    @endif
@mobile

@elsemobile


    @include('post.posts')



@endmobile


@endsection

@section('script')
    <script type="text/javascript">
        ;(function( undefined ) {
            'use strict';
                require(['home']);
        })();
    </script>
@endsection
