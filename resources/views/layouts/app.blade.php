<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Zygnixis')) - Transformation Digitale & Odoo</title>
    <meta name="description" content="@yield('meta_description', 'Zygnixis SARL : Experts en intégration Odoo, sécurité électronique et développement de solutions digitales sur mesure au Cameroun.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans text-gray-800 antialiased bg-gray-50 flex flex-col min-h-screen">
    
    @include('layouts.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.footer')

    @livewireScripts
</body>
</html>
