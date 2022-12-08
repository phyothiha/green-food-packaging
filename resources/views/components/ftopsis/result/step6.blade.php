@props([
    'collection'
])

<table {{ $attributes->merge(['class' => 'w-full overflow-hidden rounded-lg shadow-lg']) }}>
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4 text-lg">Type of Materials</th>
            <th class="p-4 text-lg">Material Cost</th>
            <th class="p-4 text-lg">Environmental Profile</th>
            <th class="p-4 text-lg">Consumer/Marketing Issue</th>
            <th class="p-4 text-lg">Properties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $fl_key => $fl_collection)
            <tr class="odd:bg-white even:bg-gray-50">
                @foreach ($fl_collection as $item)
                    <td class="p-4 text-center">
                        {{ $item }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
