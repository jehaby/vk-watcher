<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Login </title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

    @yield('style')

</head>
<body>
@include('partials.flashes')

<div class="container">
    @yield('content')
</div>


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@yield('script')


</body>
</html>