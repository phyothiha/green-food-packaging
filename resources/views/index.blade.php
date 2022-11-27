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

        <style>
        /* .button-5 {
            width: 300px;
            background-color: #F4F200;
            background-image: linear-gradient(to right, #f9fafb 0%,#f9fafb 100%);
            background-size: 600px;
            background-repeat: no-repeat;
            background-position: 0%;
            -webkit-transition: background 300ms ease-in-out;
            transition: background 300ms ease-in-out;
        }
        .button-5:hover {
            background-position: -300%;
        } */
        </style>
    </head>
    <body class="antialiased">
        <div id="app" class="relative min-h-screen bg-indigo-50">

            <div class="z-10 opacity-10 absolute inset-0 bg-repeat bg-auto bg-center bg-[length:800px_800px]" style="background-image: url({{ asset('images/background.jpg') }});"></div>

            <div class="relative z-20 grid min-h-screen grid-cols-12">

                <div class="col-span-6 px-20 py-16">
                    {{-- <button
                        x-data
                        class="transition ease-in-out duration-300 text-xs p-2.5 rounded-lg flex items-center gap-2 bg-gray-200 text-gray-500 hover:bg-red-500 hover:text-gray-50"
                        x-on:click="window.open('', '_blank', '');window.close();"
                    >
                        <x-icons.hi-arrow-left-circle class="w-4 h-4" />

                        Exit Application
                    </button> --}}


                    <h1 class="font-semibold lg:mt-16 lg:mb-12 lg:text-4xl">{{ config('app.name') }}</h1>

                    <div>
                        <h4 class="text-gray-800 lg:text-md">Site Navigation</h4>

                        <hr class="lg:mt-2.5 lg:mb-8 w-3/12 bg-indigo-500 h-1 rounded-lg">

                        <ul class="space-y-4">
                            <li>
                                <x-index.navigation-link :link="route('index')">
                                    Home
                                </x-index.navigation-link>
                            </li>
                            <li class="hidden">
                                <x-index.navigation-link :link="route('food-packaging-material.index')">
                                    Food Packaging Material
                                </x-index.navigation-link>
                            </li>
                            <li>
                                <x-index.navigation-link :link="route('food-type-for-production.index')">
                                    Food Type for Production
                                </x-index.navigation-link>
                            </li>
                            <li class="hidden">
                                <x-index.navigation-link :link="route('suggestion')">
                                    Suggestion
                                </x-index.navigation-link>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="flex flex-col items-center justify-center col-span-6 bg-gradient-to-tl from-green-700 to-yellow-500">
                    <div>
                        <img src="{{ asset('images/hero.png') }}" alt="green-food-packaging" class="w-[150px] h-[150px] mx-auto md:w-[200px]
                        md:h-[200px] lg:w-[250px] lg:h-[250px] mb-10">
                    </div>

                    <div class="md:max-w-[500px]">
                        <h1 class="text-xl font-semibold tracking-normal text-center text-white md:text-4xl md:leading-snug">
                            Multi-Criteria Decision making on Green Food Packaging
                        </h1>
                    </div>
                </div>
            </div>

        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            window.addEventListener('beforeunload', function (event) {
                localStorage.clear();
            });
        </script>
    </body>
</html>

{{--
@section('main')
    <h3 class="mb-8 text-2xl">Select a calculation</h3>

    <div class="grid gap-4 lg:grid-cols-4">
        <div>
            <x-fahp.link-card :link="route('fahp.create')">
                FAHP Calculations
            </x-fahp.link-card>
        </div>

        <div>
            <x-fahp.link-card :link="route('fahp.create')">
                Some Calculations
            </x-fahp.link-card>
        </div>
    </div>
@endsection --}}
