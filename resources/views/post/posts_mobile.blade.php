<div class="infinite-scroll">
    @foreach($posts as $post)

        <div id="my_card_{{$post->id}}">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{$post->img}}">
                        </div>
                        <div class="card-content">
                            <p class="secondary-content"> <span class="teal-text">{{$post->created_at->diffForHumans()}}</span></p>
                            <span class="card-title">{{$post->title}}</span>
                            <p>{{$post->body}}</p>
                        </div>
                        <div class="card-action">
                            <a class="  waves-effect waves-light" title="Curtir" id="like" >
                                <i class="material-icons" id="thumb_up">thumb_up</i>
                            </a>
                            <a class=" green-text waves-effect waves-light add_comment" title="Comentar"   id="{{$post->id}}"  data-form="form_comment_{{$post->id}}" >
                                <i class="material-icons">speaker_notes</i>
                            </a>
                            <a class="tooltipped red-text waves-effect waves-light show_comments" title="Comentarios" id="{{$post->id}}" data-comments="comments_{{$post->id}}" >
                                <i class="material-icons">question_answer</i>
                            </a>

                        </div>
                        <div class="card-action">

                            {{$post->Likes->count()}} Curtidas
                            <div class="chip ">
                                <img src="{{ config('avatar.150')}}{{$post->User->nickname}}" alt="Contact Person">
                                <a href="/{{$post->User->nickname}}"> {{$post->User->nickname}}</a>
                            </div>
                            <a class="modal-trigger right tooltipped" href="#modal2" data-position="top" data-delay="50" data-tooltip="Mais Ações"><i class="material-icons">more_vert</i></a>
                        </div>
                    </div>
                    <div class="row" hidden id="form_comment_{{$post->id}}">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">speaker_notes</i>
                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">Escreva um comentário...</label>
                        </div>
                    </div>

                    <ul class="collection" id="comments_{{$post->id}}" hidden>
                        <li class="collection-item avatar">
                            <img src="https://www.arteslalu.com.br/wp-content/uploads/2016/10/foto-do-cliente-kayo-morais-depoimento-lalu-50x50.png" alt="" class="circle">
                            <span class="title">Joaozinho</span>
                            <p>First Line</p>
                            <div class="row " id="respostas">
                                <div class="col s11 offset-s0">

                                    <p> <span class="teal-text accent-3">@Maria </span> Você só precisa de 21 minutos para definir todo seu corpo! ? Teste por 30 dias e veja os resultados XTREME. </p>

                                    <a href="#">Curtir</a> -
                                    <a href="#" class="reply_comment" data-form="form_replay_comment_{{$post->id}}">Responder</a>

                                    <div class="row" hidden id="form_replay_comment_{{$post->id}}">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">speaker_notes</i>
                                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                                            <label for="icon_prefix2">Escreva um consenho...</label>
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

    @endforeach

    <div id="scroll"></div>

    {{$posts->links()}}
</div>