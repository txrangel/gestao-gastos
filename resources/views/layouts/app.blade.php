<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/83b4e7d16f.js" crossorigin="anonymous"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-neutral-300 dark:bg-neutral-700 p-4">
        @if (session('sucess'))
            @include('components.alerts.sucess')
        @endif
        @if (session('error'))
            @include('components.alerts.error')
        @endif
        <!-- Sidebar -->
        @include('layouts.side-navigation')
        <!-- Conteúdo Principal -->
        <main class="transition-all duration-300 ease-in-out pl-12 md:pl-60">
            @yield('content')
        </main>
    </body>
</html>
