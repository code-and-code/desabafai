<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Google Maps API v3: Busca de endereÃ§o e Autocomplete - Demo</title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:600" type="text/css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCnkmSfh2VXFLCAUDNZyDUvSks_dSIq_XY&amp;sensor=false"></script>

    <script src="{{ asset('js/maps/mapa.js') }}"></script>
    <script src="{{ asset('js/maps/jquery-ui.custom.min.js') }}"></script>


    <style type="text/css">
        * { margin: 0; padding: 0; border: 0 }
        body { background: url(bg.png) }
        legend { display: none }

        #apresentacao {
            width: 960px;
            margin: 1% auto;
            overflow: hidden;
        }


        h1 {
            font: 25px 'Open Sans', Arial;
            text-align: center;
            color: #555;
            text-shadow: 2px 2px 0 #ccc;
            margin-bottom: 20px;
            letter-spacing: -0.5px
        }

        .campos {
            width: 740px;
            margin: 0 auto 15px;
            overflow: hidden;
        }

        .campos label {
            background: #333;
            border-radius: 6px 0 0 6px;
            color: #f0f0f0;
            cursor: pointer;
            display: block;
            height: 20px;
            float: left;
            font: 15px 'Open Sans',Arial;
            padding: 7px 13px;
            width: 70px;
        }

        .campos input[type="text"] {
            background: #FFF;
            color: #666;
            display: block;
            float: left;
            font: 15px 'Open Sans',Arial;
            height: 16px;
            padding: 9px;
            width: 475px;
        }

        .campos input[type="button"] {
            background: #2679A5;
            border-radius: 0 6px 6px 0;
            color: #FFF;
            cursor: pointer;
            height: 34px;
            font: 15px 'Open Sans',Arial;
            padding: 2px 13px 6px;
            width: 150px;

            -webkit-transition: background .2s ease-in;
            -moz-transition: background .2s ease-in;
            -ms-transition: background .2s ease-in;
            -o-transition: background .2s ease-in;
            transition: background .2s ease-in;
        }

        .campos input[type="button"]:hover { background: #12587C }

        #mapa {
            width: 940px;
            height: 400px;
            border: 10px solid #ccc;;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background: #2679A5;
            border-radius: 6px;
            color: #FFF;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            font: 20px 'Open Sans',Arial;
            padding: 7.5px 15px;
            width: 250px;

            -webkit-transition: background .2s ease-in;
            -moz-transition: background .2s ease-in;
            -ms-transition: background .2s ease-in;
            -o-transition: background .2s ease-in;
            transition: background .2s ease-in;
        }

        input[type="submit"]:hover { background: #12587C }

        .autores { background: #e5e3df; bottom: 0; border-radius: 5px 5px 0 0; padding: 5px 10px; position: fixed; left: 38%; width: 345px }
        .autores p { color: #333; font: 13px Tahoma, Arial }
        .autores p a { color: #333;	text-decoration: none }
        .autores p a:hover { text-decoration: underline }


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
</head>

<body>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large red waves-effect waves-light btn modal-trigger pulse" href="#modal1">
        <i class="large material-icons">add</i>
    </a>
</div>

<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Criar Desabafo</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate">
                        <label for="password">Título</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate">
                        <label for="email">Desabafo</label>
                    </div>
                </div>

                <fieldset>

                    <legend>Google Maps API v3: Busca de endereÃ§o e Autocomplete - Demo</legend>

                    <div class="campos">
                        <label for="txtEndereco">EndereÃ§o:</label>
                        <input type="text" id="txtEndereco" name="txtEndereco" />
                        <input type="button" id="btnEndereco" name="btnEndereco" value="Mostrar no mapa" />
                    </div>

                    <div id="mapa"></div>

                    <input type="hidden" id="txtLatitude" name="txtLatitude" />
                    <input type="hidden" id="txtLongitude" name="txtLongitude" />

                </fieldset>

                <button class="btn waves-effect waves-light right" type="submit" name="action">Publicar

                </button>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
</div>




</body>
</html>

