<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SITORIK') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="shortcut icon" type="image/jpg" href="{{ Vite::asset('resources/images/favicon.png') }}"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen">
    <livewire:layout.navigation />
{{--    <div class="border-t sticky top-0 border-b shadow-md bg-white z-10">--}}
{{--        <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8 flex flex-row items-center">--}}
{{--            <a href="{{ route('home') }}" wire:navigate>--}}
{{--                <img src="{{ Vite::asset('resources/images/sitorik.png') }}" alt="Sitorik Logo" class="h-7">--}}
{{--            </a>--}}
{{--            <ul class="grow flex gap-4 md:gap-16 justify-center">--}}
{{--                <li class="text-sm">HOME</li>--}}
{{--                <li class="text-sm">KATALOG</li>--}}
{{--                <li class="text-sm">ARTIKEL</li>--}}
{{--                <li class="text-sm">COMPARE</li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <livewire:layout.footer />
</div>
</body>
</html>
