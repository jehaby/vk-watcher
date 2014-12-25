<html>
<head>
    <title>Try Pure</title>
    <link rel="stylesheet" href="{{ asset('css/pure.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/side-menu.css') }}"/>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    {{--<link rel="stylesheet" href="{{ asset('css/purecss-mine.css') }}"/>--}}
</head>

<body class="pure-skin-mine">

<div id="layout">p
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="#">VK Watcher</a>

            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#"></a></li>

                <li class="menu-item-divided pure-menu-selected">
                    <a href="#">Services</a>
                </li>

                <li><a href="#">Contact</a></li>
            </ul>
        </div>
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
                <p> &uarr; 18:20— &darr; 18:35</p>
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
                <p> &uarr; 18:20— &darr; 18:35</p>
            </div>

            @foreach(range(0, 10) as $i)
                <div class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                    <h2> 20-12-2014</h2>
                    <p> &uarr; 9:50 — &darr; 10:00</p>
                    <p> &uarr; 11:30 — &darr; 11:45</p>
                    <p> &uarr; 14:15 — &darr; 14:40</p>
                    <p> &uarr; 16:10 — &darr; 16:30</p>
                    <p> &uarr; 18:20— &darr; 18:35</p>
                </div>
            @endforeach
        </div>





    </div>


</div>


<script src="{{ asset('js/ui.js') }}"></script>
</body>
</html>