<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
        <div id="app" class="relative z-50 min-h-screen bg-gray-100">

            <div class="relative z-20">

                <x-header/>

                <div class="bg-gradient-to-tl from-green-700 to-yellow-500 grid grid-cols-12 md:gap-4 h-[300px] md:flex md:items-center">
                    <div class="flex items-end flex-1 col-span-12 md:col-span-3">
                        <img src="{{ asset('images/hero.png') }}" alt="green-food-packaging" class="w-[150px] h-[150px] mx-auto md:w-[200px]
                        md:h-[200px] lg:w-[250px] lg:h-[250px] md:ml-auto lg:mr-14">
                    </div>

                    <div class="col-span-12 px-5 md:col-span-9 md:p-10 md:pl-0">
                        <h1 class="text-2xl font-semibold tracking-normal text-center text-white md:text-4xl md:leading-normal">
                            Multi-Criteria Decision making on Green Food Packaging
                        </h1>
                    </div>
                </div>

                <div>
                    <main class="container py-8">
                        @yield('main')
                    </main>
                </div>

            </div>

            <div class="z-10 opacity-10 absolute inset-0 bg-repeat bg-center bg-[length:800px_800px]" style="background-image: url({{ asset('images/background.jpg') }});"></div>

        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
