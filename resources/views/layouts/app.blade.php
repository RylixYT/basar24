<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @auth
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endauth

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo.png">
</head>

<body>
    @auth
        <div id="app">
            <topnav></topnav>
            <div class="d-flex align-items-stretch">
                <sidenav></sidenav>
                <div class="page-content">
                    <router-view :users="{{ User::all() }}" :user="{{ Auth::user() }}"></router-view>
                </div>
            </div>
        </div>
    @else
        <main class="center">
            @yield('content')
        </main>
    @endauth

</body>

</html>
