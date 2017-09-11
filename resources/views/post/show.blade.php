@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="http://www.istockphoto.com/resources/images/PhotoFTLP/img_75929395.jpg">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Titulo<i class="material-icons right">question_answer</i></span>
                <p>Desabafo ..............................</p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <ul class="collection" id="lista_comentarios">
                    <li class="collection-item avatar">
                        <img src="https://www.arteslalu.com.br/wp-content/uploads/2016/10/foto-do-cliente-kayo-morais-depoimento-lalu-50x50.png" alt="" class="circle">
                        <span class="title">Joaozinho</span>
                        <p>First Line</p>
                        <div class="row " id="respostas">
                            <div class="col s11 offset-s0">

                                <p> <span class="teal-text accent-3">@Maria </span> Você só precisa de 21 minutos para definir todo seu corpo! → Teste por 30 dias e veja os resultados XTREME. </p>

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
                    <li class="collection-item avatar">
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


@endsection

@section('scripts')

@endsection
