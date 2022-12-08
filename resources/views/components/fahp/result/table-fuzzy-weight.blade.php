@props([
    'result'
])

<table class="w-full overflow-hidden rounded-lg shadow-lg">
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4 text-lg"></th>
            <th class="p-4 text-lg">Fuzzy geometric mean value (r)</th>
            <th class="p-4 text-lg">Fuzzy Weight (w)</th>
            <th class="p-4 text-lg">(w)</th>
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
