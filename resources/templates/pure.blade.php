<html>
<head>
    <title>Try Pure</title>
    <link rel="stylesheet" href="{{ asset('css/pure.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/side-menu.css') }}"/>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>

<body class="pure-skin-mine">

<div id="layout">
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

    <div id="main">
        <div class="header">
            <h1>Page Title</h1>
            <h2>A subtitle for your page goes here</h2>
        </div>

        <div class="pure-g">

            <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                <h2> 20-12-2014</h2>
                <p> &uarr; 9:50 — &darr; 10:00</p>
                <p> &uarr; 16:10 — &darr; 16:30</p>
                <p> &uarr; 18:20 — &darr; 18:35</p>
            </div>

            <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                <h2> 20-12-2014</h2>

                <p> &uarr; 11:30 — &darr; 11:45</p>
                <p> &uarr; 14:15 — &darr; 14:40</p>
                <p> &uarr; 16:10 — &darr; 16:30</p>
                <p> &uarr; 18:20 — &darr; 18:35</p>
            </div>

            <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                <h2> 20-12-2014</h2>
                <p> &uarr; 9:50 — &darr; 10:00</p>
                <p> &uarr; 11:30 — &darr; 11:45</p>
                <p> &uarr; 14:15 — &darr; 14:40</p>
                <p> &uarr; 16:10 — &darr; 16:30</p>
                <p> &uarr; 18:20— &darr; 18:35</p>
                <p> &uarr; 14:15 — &darr; 14:40</p>
                <p> &uarr; 16:10 — &darr; 16:30</p>
                <p> &uarr; 18:20— &darr; 18:35</p>
                <p> &uarr; 14:15 — &darr; 14:40</p>
                <p> &uarr; 16:10 — &darr; 16:30</p>
                <p> &uarr; 18:20 — &darr; 18:35</p>
            </div>

            @foreach(range(0, 300) as $i)
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                    <h2> 20-12-2014</h2>
                    <p> &uarr; 9:50 — &darr; 10:00</p>
                    <p> &uarr; 11:30 — &darr; 11:45</p>
                    <p> &uarr; 14:15 — &darr; 14:40</p>
                    <p> &uarr; 16:10 — &darr; 16:30</p>
                    <p> &uarr; 18:20 — &darr; 18:35</p>
                </div>
            @endforeach
        </div>





    </div>


</div>


<script src="{{ asset('js/ui.js') }}"></script>
</body>
</html>