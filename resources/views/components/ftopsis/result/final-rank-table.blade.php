@props([
    'collection'
])

<table {{ $attributes->merge(['class' => 'w-full overflow-hidden text-sm rounded-lg shadow-lg']) }}>
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4">Type of Materials</th>
            <th class="p-4">Material Cost</th>
            <th class="p-4">Environmental Profile</th>
            <th class="p-4">Consumer/Marketing Issue</th>
            <th class="p-4">Properties</th>
            <th class="p-4">Rank</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $fl_key => $fl_collection)
            <tr class="text-xs odd:bg-white even:bg-gray-50">
                @foreach ($fl_collection as $item)
                    <td class="p-4 text-center">
                        {{ $item }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
