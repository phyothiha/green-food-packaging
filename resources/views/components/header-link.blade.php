@props(['routeName'])

<a
    href="{{ route($routeName) }}"
    class="
        font-medium block h-full flex items-center p-1.5 md:p-3 text-white text-sm transition duration-300 ease-in-out border-l-4 border-l-transparent
        hover:bg-white hover:text-green-800 hover:border-l-gray-500

        {{ (request()->is('food-type-for-production*')) ? 'bg-white text-green-800' : '' }}
    "
>
    {{ $slot }}
</a>
