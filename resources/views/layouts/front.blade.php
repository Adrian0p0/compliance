<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'IBB') }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>

        @yield('head-content')
    </head>
    <body class="font-sans antialiased bg-blue-500">
        @yield('notification')
        <main class="container max-w-6xl m-auto mt-12 bg-white p-5 rounded">
            <div class="w-full border-b-2 pb-4">
                <img src="{{asset('img/logo.png')}}" alt="{{ config('app.name', 'IBB') }}" class="w-48">
            </div>
            @yield('body-content')
        </main>
        @yield('footer-content')
    </body>
</html>
