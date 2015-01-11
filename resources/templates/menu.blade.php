<!-- Menu toggle -->
<a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
</a>

<div id="menu">
    <nav class="pure-menu pure-menu-open">
        <a class="pure-menu-heading" href="#">VK Watcher</a>

        <ul>

            @if(Auth::guest())
                <li><a href="{{ action('LoginController@index') }}">Вход</a></li>
                <li><a href="{{ action('LoginController@index') }}">Регистрация</a></li>
            @else

                <li><p>Привет, {{ Auth::user()->username }}</p></li>
                <li><a href={{ route('logout') }} }} >Выход</a></li>
                <li><a href={{ url('p/create') }} }} >Добавить</a></li>
            @endif




            <li class="menu-item-divided">
                <a href="#">Services</a>
            </li>

            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</div>
