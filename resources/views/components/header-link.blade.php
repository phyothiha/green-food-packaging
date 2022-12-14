@props(['link'])

<a
    href="{{ $link }}"
    class="
        font-medium block h-full flex items-center p-1.5 md:p-3 text-white text-sm md:text-base transition duration-300 ease-in-out border-l-4 border-l-transparent
        hover:bg-white hover:text-green-800 hover:border-l-gray-500

        {{ Request::url() == $link ? 'bg-white text-green-800' : '' }}
    "
>
    {{ $slot }}
</a>
