<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('materialize/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="{{ asset('materialize/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body class="grey lighten-4">
<div id="app" >

    <nav class="blue accent-3 lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Desabafaí</a>

            @guest
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
            </ul>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="right hide-on-med-and-down dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();


                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest

            <ul class="right hide-on-med-and-down">
                <li><a href="#">Sair</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Entrar</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="#"><img src="https://i.pinimg.com/originals/45/87/fb/4587fbea99ef35e2e61001fa5131f721.gif" alt="" width="50" height="50" style="margin-top:7px" class="circle responsive-img"> </a>
                </li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="#">Entrar</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>

            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

<div class="container">
    <div class="section">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>


</div>

{{--<footer class="page-footer blue lighten-2">--}}
    {{--<h6 class="center-align"><span>Desabafaí?<span> <a href="" class="pink-text">TERMOS DE USO</a></h6>--}}
    {{--<div class="footer-copyright">--}}
        {{--<div class="container center-align">--}}
            {{--Made by <a class="grey-text text-lighten-3" href="http://materializecss.com"> Desenvolvido por Code&Code</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}


<!-- Scripts -->

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('materialize/js/materialize.js') }}"></script>
<script src="{{ asset('materialize/js/init.js') }}"></script>
@section('scripts')

@show
</body>
</html>
