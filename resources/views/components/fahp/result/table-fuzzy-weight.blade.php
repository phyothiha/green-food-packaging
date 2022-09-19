@props([
    'result'
])

<table class="w-full rounded-lg shadow-lg mb-10 text-sm lg:text-base overflow-hidden">
    <thead class="bg-teal-600 text-white">
        <tr>
            <th class="p-4"></th>
            <th class="p-4">Fuzzy geometric mean value (r)</th>
            <th class="p-4">Fuzzy Weight (w)</th>
            <th class="p-4">(w)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $heading => $items)
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-4">
                    {{ Str::replace('_', ' ', $heading) }}
                </td>
                @foreach ($items as $item)
                    <td class="p-4">
                        @if ($loop->index == 1)
                            {{ $item }}
                        @else
                            ({{ $item }})
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
