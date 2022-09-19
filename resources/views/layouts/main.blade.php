<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
        <div id="app" class="min-h-screen bg-gray-100">
            <x-header/>

            <div class="bg-gradient-to-tl from-green-700 to-yellow-500 grid grid-cols-12 md:gap-4 h-[450px] flex md:items-center">
                <div class="col-span-12 md:col-span-6 flex-1 flex items-end pb-8">
                    <img src="{{ asset('images/hero.png') }}" alt="green-food-packaging" class="w-[150px] h-[150px] mx-auto md:w-[200px]
                    md:h-[200px] lg:w-[250px] lg:h-[250px] md:ml-auto lg:mr-14">
                </div>

                <div class="col-span-12 md:col-span-6 px-5 md:p-10 md:pl-0">
                    <h1 class="text-center text-2xl md:text-4xl lg:text-5xl md:max-w-[500px] font-bold text-white md:leading-tight lg:leading-tight md:tracking-tight lg:tracking-tight">
                        Multi-Criteria Decision making on Green Food Packaging
                    </h1>
                </div>
            </div>

            <div class="relative">
                <div class="z-10 bg-repeat-y bg-center opacity-20 absolute inset-0" style="background-image: url({{ asset('images/sprite.png') }}); background-size: 100px;"></div>
                <main class="container py-8 relative z-20">
                    @yield('main')
                </main>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
