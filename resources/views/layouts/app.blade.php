<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','KuSewa')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    @include('components.header')
    @yield('hero')
    <main class="flex-1">
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>
