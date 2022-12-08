@props([
    'result'
])

<table class="w-full overflow-hidden rounded-lg shadow-lg">
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4 text-lg"></th>
            <th class="p-4 text-lg">Type of Materials</th>
            <th class="p-4 text-lg">Type of Usage</th>
            <th class="p-4 text-lg">Environmental Profile</th>
            <th class="p-4 text-lg">Consumer/Marketing Issues</th>
            <th class="p-4 text-lg">Properties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $heading => $items)
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-4">
                    {{ Str::replace('_', ' ', $heading) }}
                </td>
                @foreach ($items as $item)
                    <td class="p-4">{{ $item }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
