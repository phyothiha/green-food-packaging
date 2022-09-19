@props([
    'result'
])

<table class="w-full rounded-lg shadow-lg mb-10 text-sm lg:text-base overflow-hidden">
    <thead class="bg-teal-600 text-white">
        <tr>
            <th class="p-4"></th>
            <th class="p-4">Type of Materials</th>
            <th class="p-4">Type of Usage</th>
            <th class="p-4">Environmental Profile</th>
            <th class="p-4">Consumer/Marketing Issues</th>
            <th class="p-4">Properties</th>
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
                        ({{ $item }})
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
