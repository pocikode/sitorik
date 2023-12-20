<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get started with a free and open-source admin dashboard layout built with Tailwind CSS and Flowbite featuring charts, widgets, CRUD layouts, authentication pages, and more">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.92.2">

    <title>{{ config('app.name', 'SITORIK') }}</title>

    <!-- Icons -->
    <link rel="shortcut icon" type="image/jpg" href="{{ Vite::asset('resources/images/favicon.png') }}"/>

    <!-- Scripts -->
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    @trixassets
    <script>

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-800">
@yield('layout')
@stack('scripts')
</body>
</html>
