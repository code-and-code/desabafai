<ul class="right hide-on-med-and-down">

    <li><a href="/">Posts <span class="new badge pink">4</span></a></li>

    <li>
        <a class="dropdown-button" href="#!" data-activates="dropdown_desktop">
            {{auth()->user()->nickname}}
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>


    <ul id="dropdown_desktop" class="dropdown-content">
        <li><a href="{{ route('user.edit', auth()->user()) }}">Perfil</a></li>
        <li><a href="/{{auth()->user()->nickname}}">Meus Posts</a></li>
        <li class="divider"></li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Sair
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</ul>