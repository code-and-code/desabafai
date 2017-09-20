@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="center-align responsive-img"><img class="circle" src="{{ config('avatar.150')}}{{$user->nickname}}"></div>

                    <form class="" method="POST" action="{{ route('user.update', $user) }}" id="form_user_update" data-remote="true">

                        <div class="row {{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input type="text" class="validate" name="nickname" value="{{ $user->nickname }}" autofocus id="nickname_id" required>
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
                                <input type="email" class="validate" value="{{ $user->email }}" name="email" id="email_id" required>
                                <label for="email_id">E-mail</label>
                                @if (!$errors->has('email'))
                                    <span class="help-block">
                                        <strong class="red-text" id="email"></strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/controllers/userController.js') }}"></script>
@endsection