<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Desabafaí</title>

    <!-- Styles -->
    @section('css')

    @show
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('materialize/css/materialize.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <link href="{{ asset('materialize/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css">
    <link href="{{ asset('css/loading.css') }}" type="text/css" rel="stylesheet"/>

</head>
<body class="grey lighten-4">
<div id="app">


    <div @desktop class="navbar-fixed" @enddesktop>

        <nav class="blue accent-3 lighten-1 " role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">DesabafAÍ</a>

                @guest
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>

                @else

                    @mobile
                        @include('layouts._navbar_mobile')
                    @elsemobile
                        @include('layouts._navbar')
                    @endmobile

                @endguest

            </div>
        </nav>
    </div>


    @mobile
    <div class="section">
        <div class="container">
            @yield('content')

            @section('add')
                @auth
                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large red waves-effect waves-light btn modal-trigger pulse"
                       href="{{ route('post.create') }}">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
                @endauth
            @show
        </div>
    </div>
    @elsemobile
    <div class="container">
        <div class="section">
            <div class="container">

                @yield('content')

                @section('add')
                    @auth
                    <div class="fixed-action-btn">
                        <a class="btn-floating btn-large red waves-effect waves-light btn modal-trigger pulse"
                           href="{{ route('post.create') }}">
                            <i class="large material-icons">add</i>
                        </a>
                    </div>
                    @endauth
                @show
            </div>
        </div>
    </div>
    @endmobile

    {{--<footer class="page-footer blue lighten-2">--}}
    {{--<h6 class="center-align"><span>Desabafaí?<span> <a href="" class="pink-text">TERMOS DE USO</a></h6>--}}
    {{--<div class="footer-copyright">--}}
    {{--<div class="container center-align">--}}
    {{--Made by <a class="grey-text text-lighten-3" href="http://materializecss.com"> Desenvolvido por Code&Code</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</footer>--}}

            <!-- Scripts -->
</div>

<script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js') }}"></script>
<script src="{{ asset('js/init.js') }}"></script>
<script src="{{ asset('js/vendor/blockui.js') }}"></script>
<script src="{{ asset('js/block.js') }}"></script>
@section('scripts')

@show

<script src="{{ asset('js/vendor/restful.js') }}"></script>

<script src="https://js.pusher.com/4.1/pusher.min.js"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('bf326e34306875ff98e3', {
        cluster: 'us2',
        encrypted: true
    });

    var channel = pusher.subscribe('post_channel');

    channel.bind('desabafai\\domains\\Post\\Events\\PostCreate', function(data) {

        var old = $('#news_post').html();
        if(old === '')
        {
            old = 0;
        }
        $('#news_post').html(parseInt(old)+1);
        $('#news_post_show').show();
    });
</script>

</body>
</html>
