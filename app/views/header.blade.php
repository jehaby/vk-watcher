<header>

    <nav class="navbar navbar-default" role="navigation">

        <ul class="nav navbar-nav">
            <li>
                <a href="{{ action('PersonController@index') }}" type="button" class="btn btn-default navbar-btn">
                    Главная
                </a>
            </li>
            @if(Auth::guest())
                <li><a href="{{ action('LoginController@index') }}" type="button" class="btn btn-default navbar-btn">Вход</a></li>
            @else

                <li><p class="navbar-text">Привет, {{ Auth::user()->username }}</p></li>
                <li><a href={{ route('logout') }} }} type="button" class="btn btn-default navbar-btn" >Выход</a></li>
                <li><a href={{ url('p/create') }} }} type="button" class="btn btn-default navbar-btn" >Добавить</a></li>
            @endif

        </ul>

    </nav>

</header>