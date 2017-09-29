<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
<head>
    <title>Hyperspace by HTML5 UP</title>
    <meta charset="{{ app()->getLocale() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="{{asset('hyperspace/assets/js/ie/html5shiv.js') }}"></script><![endif]-->
    <link rel="stylesheet" href="{{ asset('hyperspace/assets/css/main.css') }}" />
    <!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('hyperspace/assets/css/ie9.css') }} " /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('hyperspace/assets/css/ie8.css') }} " /><![endif]-->
</head>
<body>

<!-- Sidebar -->
<section id="sidebar">
    <div class="inner">
        <nav>
            <ul>
                <li><a href="#intro">Bem Vindo</a></li>
                <li><a href="#one">O que é o Desabafaí</a></li>
                <li><a href="#two">O que não é o Desabafaí</a></li>
                <li><a href="#three">Como Funciona</a></li>
            </ul>
        </nav>
    </div>
</section>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Intro -->
    <section id="intro" class="wrapper style1 fullscreen fade-up">
        <div class="inner">
            <h1>Desabafaí</h1>
            <p>Bem Vindo ao <a href="http://html5up.net">DESABAFAí</a><br />
                Já que chegou até aqui, não custa nada entender a ideia do sistema né?</p>
            <ul class="actions">
                <li><a href="#one" class="button scrolly">O que é o Desabafai?</a></li>
            </ul>
        </div>
    </section>

    <!-- One -->
    <section id="one" class="wrapper style2 spotlights">
        <section>
            {{--<a href="#" class="image"><img src="images/pic01.jpg" alt="" data-position="center center" /></a>--}}
            <div class="content">
                <div class="inner">
                    <h2>Dividir sentimentos ocultos</h2>
                    <p>Sabe aqueles momentos ou sentimentos que você não pode ou não consegue compartilhar com as pessoas ao seu redor?
                        Aqui você pode expressar tudo isso de forma anônima e sempre terá alguem pra te escutar, sem criticar ou julgar. </p>

                </div>
                <ul class="actions">
                    <li><a href="{{ route('register') }}" class="button">Experimentar</a></li>
                </ul>
            </div>
        </section>
        <section>
            {{--<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>--}}
            <div class="content">
                <div class="inner">
                    <h2>Fale sem medo</h2>
                    <p>Está em crise, triste, chateado, medo, raiva, vergonha, culpa, feliz, empolgado, animado, com idéias novas.
                        Você simplesmente pode se expressar tranquilamente, do forma rápida, além de dar algumas risadas ou ajudar com os desabafos dos amiguinhos anônimos.</p>
                </div>
                <ul class="actions">
                    <li><a href="#two" class="button">O que não é o Desabafaí</a></li>
                </ul>
            </div>
        </section>

    </section>

    <!-- Two -->
    <section id="two" class="wrapper style3 fade-up">
        <div class="inner">
            <h2>O que não faz parte da idéia do Desabafaí</h2>
            <p>Os usuários podem denunciar qualquer post publicado que o incomode, dessa forma será filtrado os posts saudáveis ou não.</p>
            <div class="features">
                <section>
                    <span class="icon major fa-ban"></span>
                    <h3>Pornografia</h3>
                    <p>Nossa ideia não é fazer divulgação de pornografia, e caso aconteça o post será denunciado e excluido pelo sistema.</p>
                </section>
                <section>
                    <span class="icon major fa-street-view"></span>
                    <h3>Ofenças</h3>
                    <p>Tudo aquilo que ofende a raça, religião, cor, opção sexual caso haja alguma psotagem nesse sentido será denunciado e excluido pelo sistema</p>
                </section>
                <section>
                    <span class="icon major fa-frown-o"></span>
                    <h3>Ameaças</h3>
                    <p>Toda publicação que possuir conduta que que cause dano emocional, diminuição da autoestima, humilhação, manipulação, isolamento, ou desagrade aos outros usuários ,  os mesmos poderão denunciar a publicação onde a partir de um numero(x) de denuncias será excluído pelo sistema</p>
                </section>
                <section>
                    <span class="icon major fa-users"></span>
                    <h3>Resumindo</h3>
                    <p>Todos os usuários tem poder de denuncia, e o sistema é inteligente para viabilizar se o post denunciado deve ser excluido ou não.</p>
                </section>
            </div>
            <ul class="actions">
                <li><a href="#three" class="button">Como funciona</a></li>
            </ul>
        </div>
    </section>

    <!-- Three -->
    <section id="three" class="wrapper style1 fade-up">
        <div class="inner">
            <h2>Como funciona</h2>
            <p>Publique seus desabafos seguindo os passos abaixo. É bem fácil.</p>
            <div class="split style1">
                <section>
                    <ul class="contact">
                        <li>
                            <h3>Compartilhe seus pensamentos</h3>
                            <span>
                                Para criar um desabafo, basta apenas escrever o título, e para ficar mais completo, complete com uma descrição e o local onde ocorreu.<br> Os desafos podem ser excluidos caso denunciados.
                            </span>
                        </li>
                        <li>
                            <h3>Leia e comente os desabafos dos outros</h3>
                            <span>
                                É possível commentar os desabafos alheios, opnando e ajudando a sua maneira. <br> Os comentários podem ser excluidos caso denunciados.
                            </span>
                        </li>
                        <li>
                            <h3>Experimente</h3>
                            <span>
                                Agora é so se cadastrar e começar  a usar.
                            </span>
                        </li>
                    </ul>
                    <ul class="actions">
                        <li><a href="{{ route('register') }}" class="button">Cadastre-se</a></li>
                    </ul>
                </section>
            </div>
        </div>
    </section>
</div>

{{--<!-- Footer -->--}}
{{--<footer id="footer" class="wrapper style1-alt">--}}
    {{--<div class="inner">--}}
        {{--<ul class="menu">--}}
            {{--<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</footer>--}}

<!-- Scripts -->
<script src="{{asset('hyperspace/assets/js/jquery.min.js') }} "></script>
<script src="{{ asset('hyperspace/assets/js/jquery.scrollex.min.js') }} "></script>
<script src="{{ asset('hyperspace/assets/js/jquery.scrolly.min.js') }} "></script>
<script src="{{ asset('hyperspace/assets/js/skel.min.js') }} "></script>
<script src="{{ asset('hyperspace/assets/js/util.js') }} "></script>
<!--[if lte IE 8]><script src="{{ asset('hyperspace/assets/js/ie/respond.min.js') }} "></script><![endif]-->
<script src="{{ asset('hyperspace/assets/js/main.js') }} "></script>

</body>
</html>