@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title center-align">Cadastrar</div>
                    <form class="" method="POST" action="{{ route('api.register') }}" id="form_register" data-remote="true">

                        <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input type="text" name="nickname" value="{{ old('nickname') }}"autofocus>
                                <label for="email">Apelido</label>
                                @if ($errors->has('nickname'))
                                    <span class="help-block">
                                        <strong class="red-text" id="nickname">{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" value="{{ old('email') }}" name="email">

                                <label for="email">E-mail</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" value="{{ old('password') }}" name="password">

                                <label for="email">Senha</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="validate" name="password_confirmation">
                                <label for="email">Confirme a senha</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col s12">
                                <div class="switch">
                                    <input type="checkbox" id="test5" name="term_use" value="1"/>
                                    <label for="test5">Li e aceito os <a href="#">TERMOS DE USO</a> </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary ">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-action ">
                    <a class="" href="{{ route('login') }}">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $( document ).ajaxStart($.blockUI).ajaxStop($.unblockUI).ready(function() {


            $('#form_register')
                    .on('ajax:success', function(event, xhr, status, error) {
                        swal(
                                'Valeu',
                                'Cadastrado',
                                'success'
                        )
                    })
                    .on('ajax:error', function(event, xhr, status, error) {

                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function( k, v ) {
                            alert( "Key: " + k + ", Value: " + v );
                        });
                    });


        });

    </script>

@endsection