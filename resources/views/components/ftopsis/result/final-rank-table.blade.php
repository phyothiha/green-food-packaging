@props([
    'collection'
])

<table {{ $attributes->merge(['class' => 'w-full overflow-hidden  rounded-lg shadow-lg table-result']) }}>
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4 text-lg">Type of Materials</th>
            <th class="p-4 text-lg">Rank</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $key => $value)
            <tr class=" odd:bg-white even:bg-gray-50"  data-id="{{ $key }}">
                <td class="p-4 text-center">
                    {{ $key }}
                </td>
                <td class="p-4 text-center">
                    {{ $value }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
