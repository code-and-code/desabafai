@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title center-align">Login</div>
                    <form class="" method="POST" action="{{ route('login') }}">

                        <div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" value="{{ old('email') }}" name="email" required>

                                <label for="email">Email</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="row {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" value="{{ old('password') }}" name="password" required>

                                <label for="email">Password</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-action">
                    <a class="right" href="{{ route('password.request') }}">
                       <small>Esqueci minha senha</small>
                    </a>
                    <a class="" href="{{ route('password.request') }}">
                        <small>Cadastre-se</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
