@extends('layouts.app')

@section('css')
        <link href="{{ asset('css/maps.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
@show

@section('content')
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                @mobile
                    <div>
                @elsemobile
                    <div class="card-content">
                @endmobile
                        <div class="card-title center-align">DesabafAí</div>

                        <div class="row">
                            @include('post._inputs_create')
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
