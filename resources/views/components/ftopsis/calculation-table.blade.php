@props([
    'collection'
])

<table class="w-full mb-10 overflow-hidden text-sm rounded-lg shadow-lg">
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4">Type of Materials</th>
            <th class="p-4">Type of Cost</th>
            <th class="p-4">Environmental Profile</th>
            <th class="p-4">Consumer/Marketing Issue</th>
            <th class="p-4">Properties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $fl_key => $fl_collection)
            <tr class="text-xs odd:bg-white even:bg-gray-50">

                <td class="p-4">
                    {{ $fl_key }}
                </td>

                @foreach ($fl_collection as $sl_key => $sl_collection)
                    <td class="p-4">
                        <select class="w-full text-xs border-gray-200 rounded-lg appearance-none" name="type[{{$fl_key}}][]">
                            @foreach ($sl_collection as $item)
                                <option value="{{ $item }}">
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
