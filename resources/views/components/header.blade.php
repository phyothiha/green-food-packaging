<header class="px-4 bg-green-800 h-16 shadow-lg">
    <div class="flex items-center h-full ">
        <div class="text-white text-xl font-semibold mr-20">
            Green Food Packaging
        </div>
        <ul class="flex items-center justify-center h-full">
            <li class="h-full">
                <x-header-link :link="route('home')">
                    Home
                </x-header-link>
            </li>
            <li class="h-full">
                <x-header-link :link="route('fahp.create')">
                    Calculations
                </x-header-link>
            </li>
        </ul>
    </div>
</header>
