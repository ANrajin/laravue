<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/png" href="{{asset('favicon.ico')}}" >

        <title>Sprin | Courses and Events HTML Template</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    </head>

    
    <body class="uk-background-body">
        <div id="app">
            @include('layouts.header')

            @yield('content')

            @include('layouts.footer')

            @include('layouts.off-canvas')
        </div>

        <div id="login">
            <login-modal/>
        </div>

        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/uikit.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('.dropdown-toggle').dropdown()
            })
        </script>
    </body>
</html>
