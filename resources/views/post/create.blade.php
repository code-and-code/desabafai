@extends('layouts.app')

@section('css')
        <link href="{{ asset('css/maps.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
    @show

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <div class="card-title center-align">Desabafa Aí</div>

                    <div class="row">
                        <form class="col s12" action="{{route('post.store')}}" method="POST" data-remote="true" id="form_post_create">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="title_id" type="text" name="title" class="validate">
                                    <label for="title_id">Desabafo</label>
                                    @if(!$errors->has('title'))
                                        <span class="help-block">
                                        <strong class="red-text" id="title" >{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="body_id" class="materialize-textarea" name="body"></textarea>
                                    <label for="body_id">O que aconteceu?</label>
                                    @if(!$errors->has('body'))
                                        <span class="help-block">
                                        <strong class="red-text" id="body" >{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <label for="txtEndereco">Onde Aconteceu?</label>
                                    <input type="text" id="txtEndereco" name="address"  />
                                </div>

                                <div id="mapa"></div>

                                <input type="hidden" id="txtLatitude"  name="latitude" />
                                <input type="hidden" id="txtLongitude" name="longitude" />

                            </div>
                            <button class="btn waves-effect waves-light right" type="submit">Desabafei!!

                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('add')
@show


@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp"></script>
    <script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/maps/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('js/controllers/mapController.js') }}"></script>
@endsection
