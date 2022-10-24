@props([
    'collection',
    'tblKey'
])

<table {{ $attributes->merge(['class' => 'w-full overflow-hidden text-sm rounded-lg shadow-lg table-result']) }}>
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4">d<sup>*</sup></th>
            <th class="p-4">d<sup>-</sup></th>
            <th class="p-4">CG<sub>i</sub></th>
            <th class="p-4">Rank</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $fl_key => $fl_collection)
            <tr class="text-xs odd:bg-white even:bg-gray-50" data-id="{{ $tblKey[$fl_key] }}">
                @foreach ($fl_collection as $item)
                    <td class="p-4 text-center">
                        {{ $item }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
