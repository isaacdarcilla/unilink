<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} — hassle-free school management for modern university.</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">

    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-notifications/>
<x-banner/>
<x-dialog/>

<div class="min-h-screen bg-zinc-100">
    @livewire('navigation-menu')

    <main class="soft-scrollbar">
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
