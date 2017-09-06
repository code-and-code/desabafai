@extends('layouts.app')

@section('content')
<div id="my_card">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-image">
                    <img src="http://www.istockphoto.com/resources/images/PhotoFTLP/img_75929395.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title">Card Title</span>
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <a class="tooltipped  waves-effect waves-light" title="Curtir" id="like" data-position="bottom" data-delay="50" data-tooltip="Curtir">
                        <i class="material-icons" id="thumb_up">thumb_up</i>
                    </a>
                    <a class="tooltipped green-text waves-effect waves-light"  title="Comentar" id="comentario" data-position="top" data-delay="50" data-tooltip="Comentar">
                        <i class="material-icons">speaker_notes</i>
                    </a>
                    <a class="tooltipped red-text waves-effect waves-light" title="Comentarios" id="comentarios" data-position="right" data-delay="50" data-tooltip="Comentários">
                        <i class="material-icons">question_answer</i>
                    </a>
                    <div class="chip right">
                        <img src="{{ asset('images/img.jpg') }}" alt="Contact Person">
                        Cinognato Loko
                    </div>
                </div>
                <div class="card-action">
                    33 Curtidas
                    <a class="modal-trigger right tooltipped" href="#modal2" data-position="top" data-delay="50" data-tooltip="Mais Ações"><i class="material-icons">more_vert</i></a>
                </div>
            </div>
            <div class="row" hidden id="meu_comentario">
                <div class="input-field col s12">
                    <i class="material-icons prefix">speaker_notes</i>
                    <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Escreva um comentário...</label>
                </div>
            </div>

            <ul class="collection" id="lista_comentarios" hidden>
                <li class="collection-item avatar">
                    <img src="https://www.arteslalu.com.br/wp-content/uploads/2016/10/foto-do-cliente-kayo-morais-depoimento-lalu-50x50.png" alt="" class="circle">
                    <span class="title">Joaozinho</span>
                    <p>First Line</p>
                    <div class="row " id="respostas">
                        <div class="col s11 offset-s0">

                            <p> <span class="teal-text accent-3">@Maria </span> Você só precisa de 21 minutos para definir todo seu corpo! ? Teste por 30 dias e veja os resultados XTREME. </p>

                            <a href="#">Curtir</a> -
                            <a href="#" id="responder">Responder</a>

                            <div class="row" hidden id="minha_resposta">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">speaker_notes</i>
                                    <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                                    <label for="icon_prefix2">Escreva uma resposta...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#!" class="secondary-content">1 min atrás</a>

                </li>
                <li class="collection-item avatar">
                    <img src="http://ggvconsultoria.com.br/wp-content/uploads/2016/01/papa-juan-50x50.png" alt="" class="circle">
                    <span class="title">Title</span>
                    <p>First Line <br> Second Line
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="http://ggvconsultoria.com.br/wp-content/uploads/2016/01/papa-juan-50x50.png" alt="" class="circle">
                    <span class="title">Title</span>
                    <p>First Line <br> Second Line
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
                <li class="collection-item ">
                    <div class="row" id="">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">speaker_notes</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Escreva um comentário...</label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="modal2" class="modal">
    <div class="modal-content">
        <div class="collection center-align">
            <a href="#!" class="collection-item">Vizualizar</a>
            <a href="#!" class="collection-item">Denunciar</a>
            <a href="#!" class="modal-action modal-close collection-item">Cancelar</a>
        </div>

    </div>
</div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function(){
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();

            $('#like').click(function(){

                $(this).toggleClass("lighten-5");
                $("#thumb_up").toggleClass("blue-text");

            });

            $('#comentarios').click(function(){
                $("#lista_comentarios").toggle();
            });

            $("#responder").click(function(){
                $("#minha_resposta").toggle();
            })

            $("#comentario").click(function(){
                $("#meu_comentario").toggle();
            })


        });

    </script>

@endsection
