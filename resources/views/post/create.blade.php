@extends('layouts.app')

@section('content')

    <style type="text/css">
        #mapa {
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;;
            margin-bottom: 20px;
        }

        /* =============== Estilos do autocomplete =============== */
        .ui-autocomplete {
            background: #fff;
            border-top: 1px solid #ccc;
            cursor: pointer;
            font: 15px 'Open Sans',Arial;
            margin-left: 3px;
            width: 493px !important;
            position: fixed;
        }

        .ui-autocomplete .ui-menu-item {
            list-style: none outside none;
            padding: 7px 0 9px 10px;
        }

        .ui-autocomplete .ui-menu-item:hover { background: #eee }

        .ui-autocomplete .ui-corner-all {
            color: #666 !important;
            display: block;
        }
    </style>

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
                                    <label for="title_id">Título</label>
                                    @if(!$errors->has('title'))
                                        <span class="help-block">
                                        <strong class="red-text" id="title" >{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="body_id" class="materialize-textarea" name="body"></textarea>
                                    <label for="body_id">Desabafo</label>
                                    @if(!$errors->has('body'))
                                        <span class="help-block">
                                        <strong class="red-text" id="body" >{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="input-field col s12">
                                    <label for="txtEndereco">Onde Aconteceu </label>
                                    <input type="text" id="txtEndereco" name="address" />
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
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOXe8VnXBmjiT0rIjRYIetQyLnG-WUCa4&amp;sensor=false"></script>
    <script src="{{ asset('js/maps/mapa.js') }}"></script>
    <script src="{{ asset('js/maps/jquery-ui.custom.min.js') }}"></script>

    <script>

        $( document ).ajaxStart($.blockUI).ajaxStop($.unblockUI).ready(function() {

            $(":input").bind("keyup change", function(e) {
                var name = $(this).attr('name')
                $('#'+name).html('');
            })

            $('#form_post_create')

                    .on('ajax:success', function(event, xhr, status, error) {
                        swal(
                                'Valeu',
                                'já foi....',
                                'success'
                        )
                        $(location).attr('href','/');
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
