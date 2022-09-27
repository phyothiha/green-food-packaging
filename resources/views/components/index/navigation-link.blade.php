@props(['link'])

<a
    href="{{ $link }}"
    class="
        transition-[color,background] ease-in-out duration-700
        block w-full px-4 py-3.5 rounded-lg shadow text-sm
        w-[400px] bg-green-700 bg-gradient-to-r from-white to-white bg-[length:600px] bg-no-repeat bg-[0%_center]
        hover:bg-[-400%_center] hover:text-white
    "
>
    {{ $slot }}
</a>
