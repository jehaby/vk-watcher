<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> VK Watcher </title>

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

	@yield('style')

</head>
<body>


@include('header')

<div class="container main-content">
	@yield('content')
</div>

<footer class="container">
	Copyright &COPY; {{ date('Y') }}
</footer>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@yield('script')
</body>
</html>