<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Desabafaí</title>



    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('materialize/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="{{ asset('materialize/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css">


    <link href="{{ asset('css/loading.css') }}" type="text/css" rel="stylesheet" />

</head>
<body class="grey lighten-4">
<div id="app" >

    @mobile
    <div class="">
    @elsemobile
        <div class="navbar-fixed">
    @endmobile
    <nav class="blue accent-3 lighten-1 " role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Desabafaí</a>

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
                    <!-- Dropdown Structure -->
                <ul class="right hide-on-med-and-down">

                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown_desktop">
                            <img src="{{config('avatar.200')}} {{auth()->user()->nickname}}" alt="" width="50" height="50" style="margin-top:7px" class="circle circle_avatar responsive-img">
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>

                    <ul id="dropdown_desktop" class="dropdown-content">
                        <li><a href="{{ route('user.edit', auth()->user()) }}">Perfil</a></li>
                        <li><a href="#!">Meus Posts</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown_mobile">
                            <img src="{{config('avatar.200')}} {{auth()->user()->nickname}}" alt="" width="50" height="50" style="margin-top:7px" class="circle responsive-img">
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>

                    <ul id="dropdown_mobile" class="dropdown-content">
                        <li><a href="{{ route('user.edit', auth()->user()) }}">Perfil</a></li>
                        <li><a href="#!">Meus Posts</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </ul>
            @endguest

            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    </div>

    @mobile
        <div class="section">
            <div class="container">
                @yield('content')

               @auth

                @endauth
            </div>
        </div>
    @elsemobile
    <div class="container">
        <div class="section">
            <div class="container">

                @yield('content')

                @auth
                    @include('post.create')
                @endauth
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

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset('materialize/js/materialize.js') }}"></script>
<script src="{{ asset('materialize/js/init.js') }}"></script>
<script src="{{ asset('js/restful.js') }}"></script>
<script src="{{ asset('js/blockui.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCnkmSfh2VXFLCAUDNZyDUvSks_dSIq_XY&amp;sensor=false"></script>

<script src="{{ asset('js/mapa.js') }}"></script>
<script src="{{ asset('js/jquery-ui.custom.min.js') }}"></script>

<script>
    $(document).ready(function () {

        $.blockUI.defaults.message = '<div class="loader"><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div></div><div class="circle_loading"></div>';
        $.blockUI.defaults.css =
        {
            padding:        0,
            margin:         0,
            top:            '40%',
            left:           '50%',
            textAlign:      'center',
            color:          '#fff',
            cursor:         'wait'
        };

        $(":input").bind("keyup change", function(e) {
            var name = $(this).attr('name')
            $('#'+name).html('');
        })

        $('#form_register')
                .on('ajax:before', function(event, xhr, status, error) {

                    $.blockUI();
                })
                .on('ajax:success', function(event, xhr, status, error) {

                    $.unblockUI();
                    swal(
                            'Valeu',
                            'Cadastrado',
                            'success'
                    )
                })
                .on('ajax:error', function(event, xhr, status, error) {

                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function( k, v ) {
                        $('#'+k).html(v);
                    });
                    $.unblockUI();

                });
    });
</script>
@section('scripts')

@show
</body>
</html>
