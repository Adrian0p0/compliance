<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('head')
    </head>
    <body class="font-sans antialiased">
        @yield('notification')
        <div class="min-h-screen bg-neutral-800">
            <x-navigation-backpanel/>

            <main class="container max-w-6xl m-auto mt-12 bg-white p-5 rounded">
                @yield('body-content')
            </main>

        </div>
        @yield('footer')
    </body>
</html>
