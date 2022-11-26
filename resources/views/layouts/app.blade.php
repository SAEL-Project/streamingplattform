<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('head')
</head>

<body id="app" class="min-w-screen min-h-screen flex flex-col items-center justify-start">
    @yield('body')
</body>

</html>
