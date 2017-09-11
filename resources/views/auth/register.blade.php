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
                                <input type="text" class="validate" name="nickname" value="{{ old('nickname') }}" autofocus id="nickname_id" required>
                                <label for="nickname_id">Apelido</label>

                                @if(!$errors->has('nickaname'))
                                    <span class="help-block">
                                        <strong class="red-text" id="nickname" >{{ $errors->first('nickaname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input type="email" class="validate" value="{{ old('email') }}" name="email" id="email_id" required>
                                <label for="email_id">E-mail</label>
                                @if (!$errors->has('email'))
                                    <span class="help-block">
                                        <strong class="red-text" id="email"></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input type="password" class="validate" value="{{ old('password') }}" name="password" id="password_id" required>

                                <label for="password_id">Senha</label>

                                @if(!$errors->has('password'))
                                    <span class="help-block">
                                        <strong class="red-text" id="password" >{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="validate" name="password_confirmation" id="confirm_password_id" required>
                                <label for="confirm_password_id">Confirme a senha</label>
                                @if (!$errors->has('password'))
                                    <span class="help-block">
                                        <strong class="red-text" id="password" >{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col s12">
                                <div class="switch">
                                    <input type="checkbox" name="term_use" value="1" id="term_use_id" />
                                    <label for="term_use_id" >Li e aceito os <a href="#">TERMOS DE USO</a> </label>
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

            $(":input").bind("keyup change", function(e) {
                var name = $(this).attr('name')
                $('#'+name).html('');
            })

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
                            $('#'+k).html(v);
                        });
                    });


        });

    </script>

@endsection