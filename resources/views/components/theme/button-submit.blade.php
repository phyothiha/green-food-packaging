@props([
    'slot_before_text',
    'slot_after_text',
])

<button
    type="submit"
    {{ $attributes->merge(['class' => 'transition ease-in-out duration-300 rounded-lg inline-flex items-center gap-2.5']) }}
>
    {{ $slot_before_text ?? '' }}

    {{ $slot }}

    {{ $slot_after_text ?? '' }}
</button>
