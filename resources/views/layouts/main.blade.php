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

            <div class="bg-gradient-to-tl from-green-700 to-yellow-500 grid grid-cols-12 gap-4 h-[450px] flex items-center">
                <div class="col-span-6">
                    <img src="{{ asset('images/hero.png') }}" alt="green-food-packaging" class="w-[250px] h-[250px] ml-auto mr-14">
                </div>

                <div class="col-span-6 p-10">
                    <h1 class="text-5xl font-bold text-white leading-tight tracking-tight">
                        Multi-Criteria Decision
                        <br />
                        making on
                        <br />
                        Green Food Packaging
                    </h1>
                </div>
            </div>

            <main class="container py-8">
                @yield('main')
            </main>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
