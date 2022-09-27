@props([
    'route',
    'slot_before_text',
    'slot_after_text',
])

<a
    href="{{ $route }}"
    {{ $attributes->merge(['class' => 'transition ease-in-out duration-300 rounded-lg inline-flex items-center gap-2.5']) }}
>
    {{ $slot_before_text ?? '' }}

    {{ $slot }}

    {{ $slot_after_text ?? '' }}
</a>
