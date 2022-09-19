@props(['link'])

<a
    href="{{ $link }}"
    class="block bg-gray-50 p-4 rounded-lg shadow-lg transition duration-300 ease-in-out hover:bg-green-800 hover:text-white"
>
    {{ $slot }}
</a>
