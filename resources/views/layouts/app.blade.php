<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Easy Tools') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style-login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/index.css') }}"  rel="stylesheet" >
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
</head>
    <body>
        @yield('content')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script> 
        <script src="{{ asset('js/index.js') }}"></script>      
    </body>
</html>
