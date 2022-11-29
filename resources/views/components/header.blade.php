<header class="h-16 px-4 bg-green-800 shadow-lg">
    <div class="flex items-center h-full ">
        <div class="mr-10 font-semibold text-white lg:text-xl lg:mr-20">
            Green Food Packaging
        </div>
        <ul class="flex items-center justify-center h-full">
            <li class="h-full">
                {{-- <x-header-link route-name="index">

                </x-header-link> --}}

                <a
                    href="{{ route('index') }}"
                    class="
                        font-medium block h-full flex items-center p-1.5 md:p-3 text-white  transition duration-300 ease-in-out border-l-4 border-l-transparent
                        hover:bg-white hover:text-green-800 hover:border-l-gray-500

                        {{ (request()->is('/')) ? 'bg-white text-green-800' : '' }}
                    "
                >
                    Home
                </a>
            </li>
            <li class="hidden h-full">
                {{-- <x-header-link route-name="food-packaging-material.index">
                    Food Packaging Material
                </x-header-link> --}}

                <a
                    href="{{ route('food-packaging-material.index') }}"
                    class="
                        font-medium block h-full flex items-center p-1.5 md:p-3 text-white  transition duration-300 ease-in-out border-l-4 border-l-transparent
                        hover:bg-white hover:text-green-800 hover:border-l-gray-500

                        {{ (request()->is('food-packaging-material')) ? 'bg-white text-green-800' : '' }}
                    "
                >
                    Food Packaging Material
                </a>
            </li>
            <li class="h-full">
                {{-- <x-header-link route-name="food-type-for-production.index">
                    Food Type for Production
                </x-header-link> --}}

                <a
                    href="{{ route('food-type-for-production.index') }}"
                    class="
                        font-medium block h-full flex items-center p-1.5 md:p-3 text-white  transition duration-300 ease-in-out border-l-4 border-l-transparent
                        hover:bg-white hover:text-green-800 hover:border-l-gray-500

                        {{ (request()->is('food-type-for-production')) || (request()->is('food-type-for-production/*')) ? 'bg-white text-green-800' : '' }}
                    "
                >
                    Food Type for Production
                </a>
            </li>
            <li class="hidden h-full">
                <x-header-link route-name="suggestion">
                    Suggestion
                </x-header-link>
            </li>
        </ul>
    </div>
</header>
