<ul id="slide-out" class="side-nav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="{{ asset('images/banner/profile_mobile_banner.jpg') }}">
            </div>
            <a href="#!user"> <img src="{{config('avatar.200')}} {{auth()->user()->nickname}}" style="margin-top:7px; " class="circle responsive-img"></a>
            <a href="#!name"><span class="white-text name">{{auth()->user()->nickname}}</span></a>
            <a href="#!email"><span class="white-text email">{{auth()->user()->Likes->count()}} Curtidas | {{auth()->user()->Comments->count()}} Concelhos | {{auth()->user()->Posts->count()}} Desabafos</span></a>
        </div>
    </li>
    <li><a href="{{ route('user.edit', auth()->user()) }}"><i class="material-icons">account_circle</i>Perfil</a></li>
    <li><a href="/{{auth()->user()->nickname}}"><i class="material-icons">burst_mode</i> Meus Posts</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">exit_to_app</i>Sair</a></li>
</ul>
<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
