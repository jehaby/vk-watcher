<html>
<head>
	@yield('title')
	{{--<title>Try Pure</title>--}}
	<link rel="stylesheet" href="{{ asset('css/pure.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/side-menu.css') }}"/>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>

<body class="pure-skin-mine">

<div id="layout">

	@include('menu')

	@yield('content')

</div>


<script src="{{ asset('js/ui.js') }}"></script>
</body>
</html>