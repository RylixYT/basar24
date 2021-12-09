<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DreamCars Backend</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo.png">
</head>

<body>
    @auth

        <div id="app"></div>
        <!-- Scripts -->
        <script>
            document.token =
                @php
                echo '"' . csrf_token() . '"';
                @endphp;
            document.user = @json(Auth::user());
        </script>
        <script src="{{ mix('js/app.js') }}"></script>
    @else
        <main class="center">
            @yield('content')
        </main>
    @endauth
</body>


</html>
